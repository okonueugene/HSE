<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\SOR;
use App\Models\SorTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SorController extends Controller
{
    public function store(Request $request)
    { $rules = [
        'action_owner' => 'required',
        'observation' => 'required',
        'status' => 'required',
        'steps_taken' => 'required',
        'type_id' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    $messages = [
        'action_owner.required' => 'Action owner is required',
        'observation.required' => 'Observation is required',
        'status.required' => 'Status is required',
        'steps_taken.required' => 'Steps taken is required',
        'type_id.required' => 'Type is required',
        'images.*.image' => 'The file must be an image',
        'images.*.mimes' => 'The file must be a file of type: jpeg, png, jpg, gif, svg',
        'images.*.max' => 'The file must not be greater than 2048 kilobytes',
    ];

    $this->validate($request, $rules, $messages);

    $sor = SOR::create([
        'assignor_id' => $request->assignor_id,
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

    return response()->json(['message' => 'SOR created successfully']);
    }

    public function sorTypes()
    {
       // return all sor types
       $types = SorTypes::orderBy('id', 'desc')->get()->pluck('name', 'id')->toArray();

         return response()->json($types);
    }


}
