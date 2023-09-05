<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use App\Models\User;
use App\Models\SorTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SORController extends Controller
{
    public function index()
    {
        //fetch all sor types
        $sor_types = SorTypes::all();
        //fetch all users
        $users = User::all();


        return view('admin/sor')->with([
            'sor_types' => $sor_types,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'assignee_id' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'steps_taken' => 'required',
            'type_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        $sor = SOR::create([
            'assignor_id' => auth()->user()->id,
            'assignee_id' => $request->assignee_id,
            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $request->steps_taken,
            'type_id' => $request->type_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $sor->addMedia($image)->toMediaCollection('sor_images'); // Specify the media collection
            }
        }

        return redirect()->back()->with('success', 'SOR created successfully.');
    }

}
