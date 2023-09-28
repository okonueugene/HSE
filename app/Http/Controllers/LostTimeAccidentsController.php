<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LostTimeAccidentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_lost_time_accident')->only(['index', 'show']);
        $this->middleware('permission:edit_lost_time_accident')->only(['update']);
        $this->middleware('permission:delete_lost_time_accident')->only(['destroy']);
    }

    public function index(Request $request)
    {

        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 4)->with('media')->orderBy('id', 'desc');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('incident_description', 'like', '%' . $search . '%');

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


        $losttimeaccident->incident_description = $request->input('description');
        $losttimeaccident->incident_date = $request->input('date');
        $losttimeaccident->incident_status = $request->input('status');
        $losttimeaccident->investigation_status = $request->input('investigation');


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
