<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\SOR;
use App\Models\SorTypes;
use Illuminate\Http\Request;

class SorController extends Controller
{
    public function store(Request $request)
    {

        try {
            // Initialize the data array
            $data = $request->input('_parts');

            // [
            //     [
            //         "observation",
            //         "This"
            //     ],
            //     [
            //         "status",
            //         "0"
            //     ],
            //     [
            //         "steps_taken",
            //         "That"
            //     ],
            //     [
            //         "action_owner",
            //         "Me"
            //     ],
            //     [
            //         "assignor_id",
            //         1
            //     ],
            //     [
            //         "type_id",
            //         "2"
            //     ]
            // ]

            // Create a new SOR
            $sor = SOR::create([
                'observation' => $data[0][1],
                'status' => $data[1][1],
                'steps_taken' => $data[2][1],
                'action_owner' => $data[3][1],
                'assignor_id' => $data[4][1],
                'type_id' => $data[5][1],
            ]);

            //If there are images
            if ($request->hasFile('images')) {
                // Loop through the images
                foreach ($request->file('images') as $image) {
                    // Store the image
                    $sor->addMedia($image)->toMediaCollection('sor_images');
                }
            }

            // Return a success response
            return response()->json(['message' => 'SOR created successfully'], 201);
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

}
