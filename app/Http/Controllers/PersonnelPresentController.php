<?php

namespace App\Http\Controllers;

use App\Models\PersonelPresent;
use Illuminate\Http\Request;

class PersonnelPresentController extends Controller
{
    public function index()
    {
        $personells = PersonelPresent::all();

        $personells->load('user');
        return view('admin.personnel', ['personells' => $personells]);
    }

    public function store(Request $request)
    {
        $rules = [

            'number' => 'required',
        ];

        $messages = [

            'number.required' => 'Number is required',
        ];

        $this->validate($request, $rules, $messages);

        $personnel = new PersonelPresent();
        $personnel->user_id = auth()->user()->id;
        $personnel->date = date('Y-m-d');
        $personnel->number = $request->input('number');

        $personnel->save();

        return redirect()->back()->with('success', 'Personnel present added successfully');
    }
}
