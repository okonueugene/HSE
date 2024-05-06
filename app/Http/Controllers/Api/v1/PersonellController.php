<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\PersonelPresent;
use Illuminate\Http\Request;

class PersonellController extends Controller
{
    public function index()
    {
        $data =PersonelPresent::orderBy('id', 'desc')->get();
        $data->load('user');

        return response()->json([
            'data' => $data
            , 200,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'designation' => 'required',
        ]);

        $personel = new PersonelPresent();
        $personel->user_id = auth()->id();
        $personel->date = date('Y-m-d');
        $personel->number = $request->number;
        $personel->designation = $request->designation;
        $personel->save();

        return response()->json([
            'data' => $personel
            , 200,
        ]);
    }
}
