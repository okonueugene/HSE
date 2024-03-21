<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_permit')->only(['index']);
        $this->middleware('permission:add_permit')->only(['store']);
        $this->middleware('permission:update_permit')->only(['update']);
        $this->middleware('permission:delete_permit')->only(['destroy']);
    }

    public function index()
    {
        $permits = Permit::orderBy('id', 'desc')->paginate(10);

        return view('admin/permits')->with('permits', $permits);
    }

    public function store(Request $request)
    {
        // 'user_id',
        // 'type',
        // 'date',
        // 'authorized_person',
        // 'area_owner',
        // 'competent_person',

        $rules = [
            'type' => 'required',
            'date' => 'required',
            'authorized_person' => 'required',
            'area_owner' => 'required',
            'competent_person' => 'required',
        ];

        $messages = [
            'type.required' => 'Type is required',
            'date.required' => 'Date is required',
            'authorized_person.required' => 'Authorized person is required',
            'area_owner.required' => 'Area owner is required',
            'competent_person.required' => 'Competent person is required',
        ];

        $this->validate($request, $rules, $messages);

        $permit = new Permit();
        $permit->user_id = auth()->user()->id;
        $permit->type = $request->input('type');
        $permit->date = $request->input('date');
        $permit->authorized_person = $request->input('authorized_person');
        $permit->area_owner = $request->input('area_owner');
        $permit->competent_person = $request->input('competent_person');

        $permit->save();

        return redirect()->back()->with('success', 'Permit added successfully');

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'type' => 'required',
            'date' => 'required',
            'authorized_person' => 'required',
            'area_owner' => 'required',
            'competent_person' => 'required',
        ];

        $messages = [
            'type.required' => 'Type is required',
            'date.required' => 'Date is required',
            'authorized_person.required' => 'Authorized person is required',
            'area_owner.required' => 'Area owner is required',
            'competent_person.required' => 'Competent person is required',
        ];

        $this->validate($request, $rules, $messages);

        $permit = Permit::find($id);
        $permit->type = $request->input('type');
        $permit->date = $request->input('date');
        $permit->authorized_person = $request->input('authorized_person');
        $permit->area_owner = $request->input('area_owner');
        $permit->competent_person = $request->input('competent_person');

        $permit->save();

        return redirect()->back()->with('success', 'Permit updated successfully');
    }

    public function destroy($id)
    {
        $permit = Permit::find($id);
        $permit->delete();

        return redirect()->back()->with('success', 'Permit deleted successfully');
    }

}
