<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BadPractisesController extends Controller
{
    public $assignee_id;
    public $assignor_id;
    public $observation;
    public $status;
    public $steps_taken;
    public $date;
    public $type_id;


    public function index(Request $request)
    {

        $perPage
        = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = SOR::where('type_id', 1)->with('media');

        // Apply search filter if a query is provided
        if ($search) {
            $query->where('observation', 'like', '%' . $search . '%');

        }

        $badpractises = $query->paginate($perPage);

        return view('admin/bad_practises')->with([
            'badpractices' => $badpractises,
            'search' => $search, // Pass search query to the view
        ]);

    }

    public function show($id)
    {
        $badpractice = SOR::findOrfail($id);
        $badpractice->load('media');


        return response()->json($badpractice);
    }

    public function update(Request $request, $id)
    {
        $badpractice = SOR::findOrfail($id);

        $badpractice->assignee_id = $request->assignee_id;
        $badpractice->assignor_id = $request->assignor_id;
        $badpractice->observation = $request->observation;
        $badpractice->status = $request->status;
        $badpractice->steps_taken = $request->steps_taken;
        $badpractice->date = $request->date;
        $badpractice->type_id = $request->type_id;

        $badpractice->save();

        return redirect()->back()->with('success', 'Bad Practice updated successfully.');
    }

    public function destroy($id)
    {
        $badpractice = SOR::findOrFail($id);
        $badpractice->delete();

        return response()->json(['message' => 'Bad Practice deleted successfully.']);
    }

}