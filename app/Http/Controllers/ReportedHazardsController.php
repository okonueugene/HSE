<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportedHazardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_reported_hazard')->only(['index', 'show']);
        $this->middleware('permission:edit_reported_hazard')->only(['update']);
        $this->middleware('permission:delete_reported_hazard')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $perPage = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = SOR::where('type_id', 3)->with('media')->orderBy('id', 'desc');

        // Apply search filter if a query is provided
        if ($search) {
            $query->where('observation', 'like', '%' . $search . '%');
        }

        $reportedhazards = $query->paginate($perPage);

        return view('admin/reported_hazard')->with([
            'hazards' => $reportedhazards,
            'search' => $search, // Pass search query to the view
        ]);
    }


    public function show($id)
    {
        $reportedhazard = SOR::findOrfail($id);
        $reportedhazard->load('media');

        return response()->json($reportedhazard);

    }

    public function update(Request $request, $id)
    {

        //validate the data
        $this->validate($request, array(
            'observation' => 'required',
            'status' => 'required',
            'steps_taken' => 'required',
            'date' => 'required',
        ));


        $reportedhazard = SOR::findOrfail($id);

        $reportedhazard->observation = $request->input('observation');
        $reportedhazard->status = $request->input('status');
        $reportedhazard->date = $request->input('date');
        $reportedhazard->steps_taken = $request->input('steps_taken');

        $reportedhazard->save();

        return response()->json(['success' => 'Reported Hazard updated successfully.']);

        // return redirect()->back()->with('success', 'Reported Hazard updated successfully.');
    }

    public function destroy($id)
    {

        $reportedhazard = SOR::findOrfail($id);
        $reportedhazard->delete();

        return response()->json(['success' => 'Good Practice deleted successfully.']);
    }

}
