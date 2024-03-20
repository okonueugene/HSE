<?php

namespace App\Http\Controllers;

use App\Models\PersonelPresent;
use Illuminate\Http\Request;

class PersonnelPresentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_personnel_present');
        $this->middleware('permission:add_personnel_present');
        $this->middleware('permission:edit_personnel_present');
        $this->middleware('permission:delete_personnel_present');
    }

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

    public function update(Request $request, $id)
    {
        $rules = [
            'number' => 'required',
        ];

        $messages = [
            'nnumber.required' => 'Number is required',
        ];

        $this->validate($request, $rules, $messages);

        $personnel = PersonelPresent::find($id);
        $personnel->name = $request->input('name');
        $personnel->date = date('Y-m-d');
        $personnel->user_id = auth()->user()->id;

        $personnel->save();

        return redirect()->back()->with('success', 'People on Site updated successfully');
    }

    public function destroy($id)
    {
        PersonelPresent::find($id)->delete();

        return redirect()->back()->with('success', 'People on Removed updated successfully');

    }
}
