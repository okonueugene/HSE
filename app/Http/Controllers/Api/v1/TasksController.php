<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TasksResource;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->where('user_id', auth()->id())->get();
        $tasks->load('media');

        return response()->json([
            'data' => $tasks
            , 200,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'assignee_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $task = new Task();
        $task->user_id = auth()->id();
        $task->assignee_id = $request->assignee_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->comments = $request->comments;
        $task->from = $request->from;
        $task->to = $request->to;
        $task->save();

        return response()->json([
            'data' => $task
            , 200,
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        return response()->json([
            'data' => $task
            , 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->time = $request->time;
        $task->save();

        return response()->json([
            'data' => $task
            , 200,
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            'data' => $task
            , 200,
        ]);
    }

    public function markTaskAsCompleted(Request $request)
    {
        $task = Task::find($request->task_id);

        $task->status = 'completed';

        // Upload media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                $task->addMedia($image)->toMediaCollection('task_images'); // Specify the media collection
            }
        }

        $task->save();

        return response()->json([
            'data' => $task
            , 200,
        ]);
    }
 
}
