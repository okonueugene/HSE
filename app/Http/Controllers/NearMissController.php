<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NearMissController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 1)->with('media');

        // Apply search filter if a query is provided
        if ($search) {
            $query->where('description', 'like', '%' . $search . '%');
        }

        $nearmisses = $query->paginate($perPage);

        return view('admin/near_miss')->with([
            'nearmisses' => $nearmisses,
            'search' => $search, // Pass search query to the view
        ]);
    }

    public function show($id)
    {
        $nearmiss = Incident::findOrfail($id);
        $nearmiss->load('media');

        return response()->json($nearmiss);

    }

    public function update(Request $request, $id)
    {
        $nearmiss = Incident::findOrfail($id);

        $nearmiss->assignee_id = $request->assignee_id;
        $nearmiss->assignor_id = $request->assignor_id;
        $nearmiss->observation = $request->observation;
        $nearmiss->status = $request->status;
        $nearmiss->steps_taken = $request->steps_taken;
        $nearmiss->date = $request->date;
        $nearmiss->type_id = $request->type_id;

        // Upload media
        if ($request->hasFile('media')) {
            $nearmiss->addMediaFromRequest('media')->toMediaCollection('nearmisses');
        }



        $nearmiss->save();

        return redirect()->back()->with('success', 'Near Miss updated successfully.');
    }

    public function destroy($id)
    {
        $nearmiss = Incident::findOrfail($id);
        $nearmiss->delete();

        return response()->json(['success' => 'Near Miss deleted successfully.']);
    }
}