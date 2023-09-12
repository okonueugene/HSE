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

        $query = SOR::where('type_id', 4)->with('media')->orderBy('id', 'DESC');

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
        //validate the data
        $this->validate($request, array(
           'observation' => 'required',
           'status' => 'required',
           'steps_taken' => 'required',
           'date' => 'required',
        ));


        $reportedhazard = SOR::findOrfail($id);

        $reportedhazard->observation = $request->input('observation');
        $reportedhazard->status = $request->input('status');
        $reportedhazard->date = $request->input('date');
        $reportedhazard->steps_taken = $request->input('steps_taken');

        $reportedhazard->save();

    }

    public function destroy($id)
    {
        $improvement = SOR::findOrfail($id);
        $improvement->delete();

        return response()->json('Improvement deleted successfully.');
    }
}
