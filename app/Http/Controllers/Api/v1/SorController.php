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
            dd($data);
            
            // Extract data from the array (alternative approach)
            $sorData = array_reduce($data, function ($carry, $item) {
                $carry[$item[0]] = $item[1];
                return $carry;
            }, []);

            // Create a new SOR record
            $sor = SOR::create($sorData);

            // Handle file uploads (assuming $request is available)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $sor->addMedia($image)->toMediaCollection('sor_images');
                }
            }

            return response()->json(['message' => 'SOR created successfully']);

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
