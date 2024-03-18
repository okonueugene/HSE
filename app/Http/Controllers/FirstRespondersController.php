<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstResponder;

class FirstRespondersController extends Controller
{
    public function index()
    {
        // return view('admin.first_responders');

        $first_responders = FirstResponder::all();

        $first_responders->load('user');

        return view('admin.first_responders', ['firstResponders' => $first_responders]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'type' => 'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
            'type.required' => 'Type is required',
        ];

        $this->validate($request, $rules, $messages);

        $first_responder = new FirstResponder();
        $first_responder->user_id = auth()->user()->id;
        $first_responder->name = $request->input('name');
        $first_responder->date = date('Y-m-d');
        $first_responder->type = $request->input('type');

        $first_responder->save();

        return redirect()->back()->with('success', 'First Responder added successfully');
    }
}
