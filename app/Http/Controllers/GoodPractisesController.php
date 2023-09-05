<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodPractisesController extends Controller
{
    public function index()
    {
        $goodpractices = SOR::where('type_id', 2)->with('media')->get();
        $goodpractices->load('media');
        return view('admin/good_practises')->with([
            'goodpractices' => $goodpractices,
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

        return redirect()->back()->with('success', 'Good Practice deleted successfully.');
    }
}
