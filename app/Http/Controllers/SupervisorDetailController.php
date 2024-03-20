<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view_supervisors');
        $this->middleware('permission:add_supervisors');
        $this->middleware('permission:edit_supervisors');
        $this->middleware('permission:delete_supervisors');
    }
    
    public function index()
    {

        $supervisors = Supervisor::all();

        $supervisors->load('user');

        return view('admin.supervisor' , ['supervisors' => $supervisors]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
        ];

        $this->validate($request, $rules, $messages);

        $supervisor = new Supervisor();
        $supervisor->user_id = auth()->user()->id;
        $supervisor->name = $request->input('name');
        $supervisor->date = date('Y-m-d');

        $supervisor->save();

        return redirect()->back()->with('success', 'Supervisor added successfully');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
        ];

        $this->validate($request, $rules, $messages);

        $supervisor = Supervisor::find($id);
        $supervisor->name = $request->input('name');
        $supervisor->save();

        return redirect()->back()->with('success', 'Supervisor updated successfully');
    }

    public function destroy($id)
    {
        Supervisor::find($id)->delete();

        return redirect()->back()->with('success',  'Supervisor Removed Successfully');
    }
}
