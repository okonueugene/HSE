<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\SorTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'from' => $request->from,
            'to' => $request->to,
            'user_id' => auth()->user()->id
        ]);

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function sorTypes()
    {
       // return all sor types
       $types = SorTypes::orderBy('id', 'desc')->get()->pluck('name', 'id')->toArray();

         return response()->json($types);
    }
}
