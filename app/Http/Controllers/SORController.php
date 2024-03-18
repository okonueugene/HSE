<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use App\Models\User;
use App\Models\SorTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SORController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_sor')->only(['index', 'show']);
        $this->middleware('permission:add_sor')->only(['store']);
        $this->middleware('permission:edit_sor')->only(['update']);
        $this->middleware('permission:delete_sor')->only(['destroy']);
    }

    public function index()
    {
        //fetch all sor types
        $sor_types = SorTypes::orderBy('id', 'desc')->get();
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
            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'steps_taken' => 'required',
            'type_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        $sor = SOR::create([
            'assignor_id' => auth()->user()->id,
            'action_owner' => $request->action_owner,
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

    //open sor
    public function openSor()
    {
        $sors = SOR::where('status', 0)->orderBy('id', 'desc')->paginate(10);
        $sors->load('media');
        return view('admin/open_sors')->with('sors', $sors);
    }

}
