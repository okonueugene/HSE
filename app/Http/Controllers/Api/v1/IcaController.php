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

        // $rules = [

        //     'action_owner' => 'required',
        //     'observation' => 'required',
        //     'status' => 'required',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ];

        $this->validate($request, $rules);

        $steps_taken = json_decode($request->input('steps_taken'), true);

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

        return response()->json(['message' => 'ICA created successfully', 'data' => $icas], 200);
    }

    public function show($id)
    {
        $icas = Icas::find($id);

        //load media
        $icas->load('media');

        return response()->json([
            'data' => $icas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [

            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

        $this->validate($request, $rules);

        $steps_taken = json_decode($request->input('steps_taken'), true);

        $icas = Icas::find($id);
        $icas->action_owner = $request->action_owner;
        $icas->observation = $request->observation;
        $icas->status = $request->status;
        $icas->steps_taken = $steps_taken;
        $icas->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $icas->addMedia($image)->toMediaCollection('icas_images');
            }
        }

        return response()->json(['message' => 'ICA updated successfully', 'data' => $icas], 200);
    }

    public function destroy($id)
    {
        $icas = Icas::find($id);
        $icas->delete();

        return response()->json('ICA deleted successfully');
    }

}
