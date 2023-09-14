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

        $query = SOR::where('type_id', 2)->with('media')->orderBy('id', 'desc');

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
        //validate the data
        $this->validate($request, array(
         'observation' => 'required',
         'status' => 'required',
         'steps_taken' => 'required',
         'date' => 'required',
        ));


        $goodpractice = SOR::findOrfail($id);

        $goodpractice->observation = $request->input('observation');
        $goodpractice->status = $request->input('status');
        $goodpractice->date = $request->input('date');
        $goodpractice->steps_taken = $request->input('steps_taken');

        $goodpractice->save();

    }

    public function destroy($id)
    {
        $goodpractice = SOR::findOrfail($id);
        $goodpractice->delete();

        return response()->json(['success' => 'Good Practice deleted successfully.']);
    }
}
