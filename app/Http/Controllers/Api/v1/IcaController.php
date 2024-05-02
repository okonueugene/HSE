<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Icas;
use Illuminate\Http\Request;

class IcaController extends Controller
{
    public function index()
    {
        $icas = Icas::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->get();

        //load media
        $icas->load('media');

        return response()->json([
            'data' => $icas,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [

            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

        $this->validate($request, $rules);

        $steps_taken = json_decode($request->input('steps_taken_json'), true);

        $icas = Icas::create([
            'user_id' => auth()->user()->id,
            'action_owner' => $request->action_owner,
            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $steps_taken,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $icas->addMedia($image)->toMediaCollection('icas_images');
            }
        }

        return redirect()->back()->with('success', 'ICA created successfully.');
    }

}
