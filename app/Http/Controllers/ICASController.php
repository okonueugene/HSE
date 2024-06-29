<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Icas;
use App\Models\User;
use Illuminate\Http\Request;

class ICASController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_icas')->only(['index', 'show']);
        $this->middleware('permission:add_icas')->only(['store']);
        $this->middleware('permission:edit_icas')->only(['update']);
        $this->middleware('permission:delete_icas')->only(['destroy']);
    }

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

        return view('admin/icas/index')->with([

            'icas' => $icas,

            'search' => $search, // Pass search query to the view

        ]);
    }

    public function create()
    {

        $users = User::all();
        return view('admin/icas/create')->with([
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [

            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

        $this->validate($request, $rules);

        $steps_taken = json_decode($request->input('steps_taken_json'), true);

        $icas = Icas::create([
            'user_id' => auth()->user()->id,
            'action_owner' => $request->action_owner,
            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $steps_taken,
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
