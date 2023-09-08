<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportedHazardsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = SOR::where('type_id', 3)->with('media');

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
        $reportedhazard = SOR::findOrfail($id);

        $reportedhazard->assignee_id = $request->assignee_id;
        $reportedhazard->assignor_id = $request->assignor_id;
        $reportedhazard->observation = $request->observation;
        $reportedhazard->status = $request->status;
        $reportedhazard->steps_taken = $request->steps_taken;
        $reportedhazard->date = $request->date;
        $reportedhazard->type_id = $request->type_id;

        $reportedhazard->save();

        return redirect()->back()->with('success', 'Reported Hazard updated successfully.');
    }

    public function destroy($id)
    {

        $reportedhazard = SOR::findOrfail($id);
        $reportedhazard->delete();

        return response()->json(['success' => 'Good Practice deleted successfully.']);
    }

}