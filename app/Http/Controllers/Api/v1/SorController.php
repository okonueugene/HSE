<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\SOR;
use App\Models\SorTypes;
use Illuminate\Http\Request;

class SorController extends Controller
{
    public function index()
    {
        $sors = SOR::orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'steps_taken' => 'required',
            'type_id' => 'required',
        ];

        $messages = [
            'action_owner.required' => 'Action owner is required',
            'observation.required' => 'Observation is required',
            'status.required' => 'Status is required',
            'steps_taken.required' => 'Steps taken is required',
            'type_id.required' => 'Type is required',
       
        ];

        $this->validate($request, $rules, $messages);
        $steps_taken = json_decode($request->input('steps_taken'), true);

        try {
            // Create a new SOR record
            $sor = SOR::create([
                'assignor_id' => $request->input('assignor_id'),
                'action_owner' => $request->input('action_owner'),
                'observation' => $request->input('observation'),
                'status' => $request->input('status'),
                'date' => date('Y-m-d'),
                'steps_taken' => $steps_taken,
                'type_id' => $request->input('type_id'),
            ]);

            // Handle file uploads
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $sor->addMedia($image)->toMediaCollection('sor_images');
                }
            }

            return response()->json(['message' => 'SOR created successfully', 'data' => $sor], 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function sorTypes()
    {
        // return all sor types
        $types = SorTypes::orderBy('id', 'desc')->get()->pluck('name', 'id')->toArray();

        return response()->json($types);
    }

    public function openSor()
    {
        $sors = SOR::where('status', 0)->orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }

    public function badPractices()
    {
        $sors = SOR::where('type_id', 1)->orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }

    public function goodPractices()
    {
        $sors = SOR::where('type_id', 2)->orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }

    public function reportedHazards()
    {
        $sors = SOR::where('type_id', 3)->orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }

    public function improvements()
    {
        $sors = SOR::where('type_id', 4)->orderBy('id', 'desc')->get();
        $sors->load('media');
        return response()->json(['data' => $sors], 200);
    }
}
