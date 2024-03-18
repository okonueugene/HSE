<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorDetailController extends Controller
{
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
}
