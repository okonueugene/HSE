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

            $query->where('description', 'like', '%' . $search . '%');

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

        $medicaltreatedcase->assignee_id = $request->assignee_id;
        $medicaltreatedcase->assignor_id = $request->assignor_id;
        $medicaltreatedcase->observation = $request->observation;
        $medicaltreatedcase->status = $request->status;
        $medicaltreatedcase->steps_taken = $request->steps_taken;
        $medicaltreatedcase->date = $request->date;
        $medicaltreatedcase->type_id = $request->type_id;

        // Upload media
        if ($request->hasFile('media')) {
            $medicaltreatedcase->addMediaFromRequest('media')->toMediaCollection('medicaltreatedcases');
        }

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