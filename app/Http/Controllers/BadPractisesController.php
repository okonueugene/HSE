<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BadPractisesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_bad_practise')->only(['index', 'show']);
        $this->middleware('permission:edit_bad_practise')->only(['update']);
        $this->middleware('permission:delete_bad_practise')->only(['destroy']);
    }


    public function index(Request $request)
    {

        $perPage
        = 8; // Number of records per page

        // Check if a search query is present
        $search = $request->input('search');

        $query = SOR::where('type_id', 1)->with('media')->orderBy('id', 'desc');

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

        $badpractice->observation = $request->observation;
        $badpractice->status = $request->status;
        $badpractice->steps_taken = $request->steps_taken;
        $badpractice->date = $request->date;

        $badpractice->save();

    }

    public function destroy($id)
    {
        $badpractice = SOR::findOrFail($id);
        $badpractice->delete();

        return response()->json(['message' => 'Bad Practice deleted successfully.']);
    }

}
