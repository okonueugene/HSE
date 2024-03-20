<?php

namespace App\Http\Controllers;

use App\Models\FirstResponder;
use Illuminate\Http\Request;

class FirstRespondersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_first_responder');
        $this->middleware('permission:add_first_responder');
        $this->middleware('permission:edit_first_responder');
        $this->middleware('permission:delete_first_responder');
    }

    public function index()
    {
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

    public function update(Request $request, $id)
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

        $first_responder = FirstResponder::find($id);

        $first_responder->name = $request->input('name');
        $first_responder->type = $request->input('type');

        $first_responder->save();

        return redirect()->back()->with('success', 'First Responder updated successfully');



    }
    
    public function destroy($id)
    {
        FirstResponder::find($id)->delete();

        return redirect()->back()->with('success',  'First Responder Removed Successfully');
    }
}
