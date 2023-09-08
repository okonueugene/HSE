<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodPractisesController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = SOR::where('type_id', 2)->with('media');

        // Apply search filter if a query is provided
        if ($search) {
            $query->where('observation', 'like', '%' . $search . '%');
        }

        $goodpractises = $query->paginate($perPage);

        return view('admin/good_practises')->with([
            'goodpractices' => $goodpractises,
            'search' => $search, // Pass search query to the view
        ]);
    }


    public function show($id)
    {
        $goodpractice = SOR::findOrfail($id);
        $goodpractice->load('media');

        return response()->json($goodpractice);
    }


    public function update(Request $request, $id)
    {
        $goodpractice = SOR::findOrfail($id);

        $goodpractice->assignee_id = $request->assignee_id;
        $goodpractice->assignor_id = $request->assignor_id;
        $goodpractice->observation = $request->observation;
        $goodpractice->status = $request->status;
        $goodpractice->steps_taken = $request->steps_taken;
        $goodpractice->date = $request->date;
        $goodpractice->type_id = $request->type_id;

        $goodpractice->save();

        return redirect()->back()->with('success', 'Good Practice updated successfully.');
    }

    public function destroy($id)
    {
        $goodpractice = SOR::findOrfail($id);
        $goodpractice->delete();

        return response()->json(['success' => 'Good Practice deleted successfully.']);
    }
}