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
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $task = new Task();
        $task->user_id = auth()->id();
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
    
}
