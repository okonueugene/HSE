<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SIFController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 5)->with('media');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('incident_description', 'like', '%' . $search . '%');

        }

        $sifs = $query->paginate($perPage);

        return view('admin/sif')->with([

            'sifs' => $sifs,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function show($id)
    {
        $sif = Incident::findOrFail($id);
        $sif->load('media');

        return response()->json($sif);

    }

    public function update(Request $request, $id)
    {
        $sif = Incident::findOrFail($id);

        $sif->incident_description = $request->input('description');
        $sif->incident_date = $request->input('date');
        $sif->incident_status = $request->input('status');
        $sif->investigation_status = $request->input('investigation');

        $sif->save();

        return response()->json($sif);

    }

    public function destroy($id)
    {
        $sif = Incident::findOrFail($id);
        $sif->delete();

        return response()->json('message: Successfully deleted');

    }
}
