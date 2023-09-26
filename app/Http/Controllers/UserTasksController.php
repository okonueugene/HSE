<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->with('media')->paginate(10);
        return view('admin/task')->with([
            'tasks' => $tasks,
            'users' => User::all(),
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

        return redirect()->route('user-tasks')->with('success', 'Task has been added successfully');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $task->load('media');

        //convert to json
        $task = response()->json($task);
        $task = json_decode($task->getContent());


        return view('admin/task_show')->with([
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

        return redirect()->route('user-tasks')->with('success', 'Task has been updated successfully');


    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('user-tasks')->with('success', 'Task deleted successfully');
    }
}
