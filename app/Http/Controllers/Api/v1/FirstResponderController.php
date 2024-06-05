<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\FirstResponder;
use App\Http\Controllers\Controller;

class FirstResponderController extends Controller
{
    public function index()
    {
        $data = FirstResponder::orderBy('id', 'desc')->get();
        $data->load('user');

        return response()->json([
            'data' => $data
            , 200,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $firstResponder = new FirstResponder();
        $firstResponder->user_id = auth()->id();
        $firstResponder->name = $request->name;
        $firstResponder->date = date('Y-m-d');
        $firstResponder->type = $request->type;
        $firstResponder->save();

        return response()->json([
            'data' => $firstResponder
            , 200,
        ]);
    }

    public function show($id)
    {
        $data = FirstResponder::find($id);
        $data->load('user');

        return response()->json([
            'data' => $data
            , 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $firstResponder = FirstResponder::find($id);
        $firstResponder->user_id = auth()->id();
        $firstResponder->name = $request->name;
        $firstResponder->date = date('Y-m-d');
        $firstResponder->type = $request->type;
        $firstResponder->save();

        return response()->json([
            'data' => $firstResponder
            , 200,
        ]);
    }

    public function destroy($id)
    {
        $firstResponder = FirstResponder::find($id);
        $firstResponder->delete();

        return response()->json([
            'data' => $firstResponder
            , 200,
        ]);
    }
}
