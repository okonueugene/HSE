<?php

namespace App\Http\Controllers;

use App\Models\Icas;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ICASController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 9;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Icas::with('media')->orderBy('id', 'desc');


        // Apply search filter if a query is provided

        if ($search) {

            $query->where('observation', 'like', '%' . $search . '%');

        }

        $icas = $query->paginate($perPage);

        return view('admin/icas')->with([

            'icas' => $icas,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function create()
    {

        $users = User::all();
        return view('admin/add-icas')->with([
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [

            'action_owner_id' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'steps_taken' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

        $this->validate($request, $rules);


        $icas = Icas::create([
            'user_id' => auth()->user()->id,
            'action_owner_id' => $request->action_owner_id,
            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $request->steps_taken,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $icas->addMedia($image)->toMediaCollection('icas_images');
            }
        }

        return redirect()->back()->with('success', 'ICA created successfully.');
    }

    public function show($id)
    {
        $icas = Icas::findOrFail($id);
        $icas->load('media');

        $users = User::whereIn('id', [$icas->user_id, $icas->action_owner_id])->pluck('name', 'id');

        $data = [
            'icas' => $icas,
            'users' => $users,
        ];

        return response()->json($data);

    }

    public function update(Request $request, $id)
    {
        $icas = Icas::findOrFail($id);

        $icas->update([

            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $request->steps_taken,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $icas->addMedia($image)->toMediaCollection('icas_images');
            }
        }

        return response()->json(['success' => 'ICA updated successfully.']);
    }

    public function destroy($id)
    {
        $icas = Icas::findOrFail($id);
        $icas->delete();

        return response()->json(['success' => 'ICA deleted successfully.']);
    }

}
