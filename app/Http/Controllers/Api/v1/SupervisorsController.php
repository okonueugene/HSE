<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupervisorsController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::orderBy('id', 'desc')->get();
        $supervisors->load('user');

        return response()->json([
            'data' => $supervisors
            , 200,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        $supervisor = new Supervisor();
        $supervisor->user_id = auth()->id();
        $supervisor->name = $request->name;
        $supervisor->date = date('Y-m-d');
        $supervisor->designation = $request->designation;
        $supervisor->save();

        return response()->json([
            'data' => $supervisor
            , 200,
        ]);
    }

}
