<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirstAidCaseController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 2)->with('media');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('description', 'like', '%' . $search . '%');

        }

        $firstaidcases = $query->paginate($perPage);

        return view('admin/first_aid_case')->with([

            'firstaidcases' => $firstaidcases,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function show($id)
    {
        $firstaidcase = Incident::findOrFail($id);
        $firstaidcase->load('media');

        return response()->json($firstaidcase);

    }

    public function update(Request $request, $id)
    {
        $firstaidcase = Incident::findOrFail($id);

        $firstaidcase->incident_description = $request->input('description');
        $firstaidcase->incident_date = $request->input('date');
        $firstaidcase->incident_status = $request->input('status');
        $firstaidcase->investigation_status = $request->input('investigation');


        // Upload media
        if ($request->hasFile('media')) {
            $firstaidcase->addMediaFromRequest('media')->toMediaCollection('firstaidcases');
        }

        $firstaidcase->save();

        return response()->json($firstaidcase);
    }

    public function destroy($id)
    {
        $firstaidcase = Incident::findOrFail($id);
        $firstaidcase->delete();

        return response()->json(['success' => 'First Aid Case deleted successfully.']);
    }
}
