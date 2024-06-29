<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class UserTasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_tasks')->only(['index', 'show']);
        $this->middleware('permission:add_tasks')->only(['store']);
        $this->middleware('permission:edit_tasks')->only(['update']);
        $this->middleware('permission:delete_tasks')->only(['destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Task::orderBy('id', 'desc');

            // Apply search filter if a query is provided
            // filters
            if (!empty(request()->filters)) {
                $filters = request()->filters;

                if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
                    $query->whereBetween('from', [$filters['start_date'], $filters['end_date']]);
                }
                if ($filters['status'] !== null && $filters['status'] !== '') {
                    $query->where('status', $filters['status']);
                }
                if (!empty($filters['user_id'])) {
                    $query->where('user_id', $filters['user_id']);
                }
                if (!empty($filters['assignee_id'])) {
                    $query->where('assignee_id', $filters['assignee_id']);
                }
            }

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $row->load('media', 'assignee', 'user');
                    $html =
                    '
                    <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">Action
                      </button>
                      <ul class="dropdown-menu">

                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            onclick="viewTask(' . $row->id . ')">View</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            onclick="editTask(' . $row->id . ')">Edit</a>
                        </li>
                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            onclick="deleteTask(' . $row->id . ')">Delete</a>
                        </li>
                      </ul>
                    </div>
                    ';
                    return $html;
                })
                ->addColumn('serial_no', function ($row) {
                    static $serialNumber = 0;
                    $serialNumber++;
                    return $serialNumber;
                })
                ->addColumn('assignee', function ($row) {
                    return $row->assignee->name;
                })
                ->editColumn('title', function ($row) {
                    //limit the title to 50 characters
                    return strlen($row->title) > 50 ? substr($row->title, 0, 50) . '...' : $row->title;
                })
                ->editColumn('status', function ($row) {
                    $html = '';
                    if ($row->status == 'pending') {
                        $html = '<span class="badge bg-danger">Pending</span>';
                    } else {
                        $html = '<span class="badge bg-success">Completed</span>';
                    }
                    return $html;
                })
                ->editColumn('from', function ($row) {
                    return format_date($row->from);
                })
                ->editColumn('to', function ($row) {
                    return format_date($row->to);
                })
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('media', function ($row) {
                    $media = '';
                    foreach ($row->media as $image) {
                        $media .= '<img src="' . $image->getUrl() . '" width="50" height="50" class="img-thumbnail" />';
                    }
                    return $media;
                })
                ->rawColumns(['action', 'media', 'status', 'from', 'to', 'title'])
                ->make(true);
        }

        $page_title = 'Tasks';
        $tasks = Task::all();
        $assignees = User::whereIn('id', $tasks->pluck('assignee_id'))->get();
        $creators = User::whereIn('id', $tasks->pluck('user_id'))->get();
        $users = User::all();
        return view('admin/tasks/index')->with([
            'assignees' => $assignees,
            'creators' => $creators,
            'users' => $users,
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'from' => 'required',
            'to' => 'required',
        ];

        $this->validate($request, $rules);
        $task = new Task();
        $task->user_id = auth()->user()->id;
        $task->assignee_id = $request->user_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->comments = $request->comments;
        $task->from = $request->from;
        $task->to = $request->to;

        // Upload media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                $task->addMedia($image)->toMediaCollection('task_images'); // Specify the media collection
            }
        }

        $task->save();

        return redirect()
            ->route('user-tasks')
            ->with('success', 'Task has been added successfully');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $task->load('media');

        //convert to json
        $task = response()->json($task);
        $task = json_decode($task->getContent());

        return view('admin/tasks/edit')->with([
            'task' => $task,
            'users' => User::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        //update
        $task->title = $request->title;
        $task->description = $request->description;
        $task->from = $request->from;
        $task->to = $request->to;
        $task->comments = $request->comments;
        $task->status = $request->status;

        $task->save();

        return redirect()
            ->route('user-tasks')
            ->with('success', 'Task has been updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()
            ->route('user-tasks')
            ->with('success', 'Task deleted successfully');
    }
}
