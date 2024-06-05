<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Permit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermitsApplicableController extends Controller
{
    public function index()
    {
        $permits = Permit::orderBy('id', 'desc')->get();
        $permits->load('user');

        return response()->json([
            'data' => $permits
            , 200,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'authorized_person' => 'required',
            'area_owner' => 'required',
            'competent_person' => 'required',
        ]);

        $permit = new Permit();
        $permit->user_id = auth()->id();
        $permit->type = $request->type;
        $permit->date = date('Y-m-d');
        $permit->authorized_person = $request->authorized_person;
        $permit->area_owner = $request->area_owner;
        $permit->competent_person = $request->competent_person;
        $permit->save();

        return response()->json([
            'data' => $permit
            , 200,
        ]);
    }

    public function show($id)
    {
        $permit = Permit::find($id);
        $permit->load('user');

        return response()->json([
            'data' => $permit
            , 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'authorized_person' => 'required',
            'area_owner' => 'required',
            'competent_person' => 'required',
        ]);

        $permit = Permit::find($id);
        $permit->type = $request->type;
        $permit->authorized_person = $request->authorized_person;
        $permit->area_owner = $request->area_owner;
        $permit->competent_person = $request->competent_person;
        $permit->save();

        return response()->json([
            'data' => $permit
            , 200,
        ]);
    }

    public function destroy($id)
    {
        $permit = Permit::find($id);
        $permit->delete();

        return response()->json([
            'message' => 'Permit deleted successfully'
            , 200,
        ]);
    }

}
