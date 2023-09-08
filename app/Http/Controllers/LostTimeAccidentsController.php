<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LostTimeAccidentsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 4)->with('media');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('description', 'like', '%' . $search . '%');

        }

        $losttimeaccidents = $query->paginate($perPage);

        return view('admin/lost_time_accidents')->with([

            'losttimeaccidents' => $losttimeaccidents,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function show($id)
    {
        $losttimeaccident = Incident::findOrFail($id);
        $losttimeaccident->load('media');

        return response()->json($losttimeaccident);

    }

    public function update(Request $request, $id)
    {
        $losttimeaccident = Incident::findOrFail($id);

        $losttimeaccident->assignee_id = $request->assignee_id;
        $losttimeaccident->assignor_id = $request->assignor_id;
        $losttimeaccident->observation = $request->observation;
        $losttimeaccident->status = $request->status;
        $losttimeaccident->steps_taken = $request->steps_taken;
        $losttimeaccident->date = $request->date;
        $losttimeaccident->type_id = $request->type_id;

        $losttimeaccident->save();

        return response()->json($losttimeaccident);

    }

    public function destroy($id)
    {
        $losttimeaccident = Incident::findOrFail($id);
        $losttimeaccident->delete();

        return response()->json('message: Deleted Successfully');

    }
}