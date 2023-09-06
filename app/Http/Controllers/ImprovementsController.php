<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImprovementsController extends Controller
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

        $improvements = $query->paginate($perPage);

        return view('admin/improvements')->with([
            'improvements' => $improvements,
            'search' => $search, // Pass search query to the view
        ]);


    }

    public function show($id)
    {
        $improvement = SOR::findOrfail($id);
        $improvement->load('media');

        return response()->json($improvement);

    }

    public function update(Request $request, $id)
    {
        $improvement = SOR::findOrfail($id);

        $improvement->assignee_id = $request->assignee_id;
        $improvement->assignor_id = $request->assignor_id;
        $improvement->observation = $request->observation;
        $improvement->status = $request->status;
        $improvement->steps_taken = $request->steps_taken;
        $improvement->date = $request->date;
        $improvement->type_id = $request->type_id;

        $improvement->save();

        return redirect()->back()->with('success', 'Improvement updated successfully.');
    }

    public function destroy($id)
    {
        $improvement = SOR::findOrfail($id);
        $improvement->delete();

        return redirect()->back()->with('success', 'Improvement deleted successfully.');
    }
}
