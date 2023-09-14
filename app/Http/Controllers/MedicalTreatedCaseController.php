<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalTreatedCaseController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 3)->with('media');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('incident_description', 'like', '%' . $search . '%');

        }

        $medicaltreatedcases = $query->paginate($perPage);

        return view('admin/medical_treated_case')->with([

            'medicaltreatedcases' => $medicaltreatedcases,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function show($id)
    {
        $medicaltreatedcase = Incident::findOrFail($id);
        $medicaltreatedcase->load('media');

        return response()->json($medicaltreatedcase);

    }

    public function update(Request $request, $id)
    {
        $medicaltreatedcase = Incident::findOrFail($id);

        $medicaltreatedcase->incident_description = $request->input('description');
        $medicaltreatedcase->incident_date = $request->input('date');
        $medicaltreatedcase->incident_status = $request->input('status');
        $medicaltreatedcase->investigation_status = $request->input('investigation');


        $medicaltreatedcase->save();

        return response()->json($medicaltreatedcase);

    }

    public function destroy($id)
    {
        $medicaltreatedcase = Incident::findOrfail($id);
        $medicaltreatedcase->delete();

        return response()->json(['success' => 'Medical Treated Case deleted successfully.']);
    }
}
