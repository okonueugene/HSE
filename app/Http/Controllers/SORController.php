<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use App\Models\User;
use App\Models\SorTypes;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SORController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_sor')->only(['index', 'show']);
        $this->middleware('permission:add_sor')->only(['store']);
        $this->middleware('permission:edit_sor')->only(['update']);
        $this->middleware('permission:delete_sor')->only(['destroy']);
    }

    public function index()
    {
        //fetch all sor types
        $sor_types = SorTypes::orderBy('id', 'desc')->get();
        //fetch all users
        $users = User::all();

        return view('admin/sors/index')->with([
            'sor_types' => $sor_types,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'action_owner' => 'required',
            'observation' => 'required',
            'status' => 'required',
            'steps_taken_json' => 'required',
            'type_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        // Decode the JSON string into an array of steps
        $steps_taken = json_decode($request->input('steps_taken_json'), true);

        $sor = SOR::create([
            'assignor_id' => auth()->user()->id,
            'action_owner' => $request->action_owner,
            'observation' => $request->observation,
            'status' => $request->status,
            'date' => date('Y-m-d'),
            'steps_taken' => $steps_taken,
            'type_id' => $request->type_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $sor->addMedia($image)->toMediaCollection('sor_images');
            }
        }

        return redirect()->back()->with('success', 'SOR created successfully.');
    }

    //open sor
    public function openSor(Request $request)
    {
        if ($request->ajax()) {
            $query = SOR::where('status', 0)->orderBy('id', 'desc');
            // filters
            if (!empty(request()->filters)) {
                //filter by date
                if (!empty(request()->filters['start_date'] && !empty(request()->filters['end_date']))) {
                    $query->whereDate('date', '>=', request()->filters['start_date'])->whereDate('date', '<=', request()->filters['end_date']);
                }
                //filter by type
                if (!empty(request()->filters['type'])) {
                    $query->where('type_id', request()->filters['type']);
                }

                //filter by status
                if (!empty(request()->filters['status'])) {
                    $query->where('status', request()->filters['status']);
                }
                //filter by user
                if (!empty(request()->filters['assignor'])) {
                    $query->where('assignor_id', request()->filters['assignor']);
                }
            }
            //example json {"id":"1","assignor_id":"1","action_owner":"Dry construction","type_id":"1","observation":"Poor site housekeeping","status":"0","steps_taken":"[]","date":"2024-06-05","created_at":"2024-06-05 11:55:59","updated_at":"2024-06-05 11:55:59"}
            return DataTables::of($query)
                ->addColumn(
                'action',
                function ($row) {
                $row->load('media', 'assignor', 'type');
                $html = '
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-expanded="false">Action
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#" class="dropdown-item" data-bs-toggle="modal" onclick="showSor(' . $row->id . ')">
                        View
                      </a>
                    </li>
                  </ul>
                </div>
                ';
                return $html;
                }
                )
                ->addColumn('serial_no', function ($row) {
                    static $serialNumber = 0;
                    $serialNumber++;
                    return $serialNumber;
                })
                ->addColumn('type', function ($row) {
                    return $row->type->name;
                })
                ->addColumn('assignor', function ($row) {
                    return $row->assignor->name;
                })
                ->addColumn('status', function ($row) {
                    $html = '';
                    if ($row->status == 0) {
                        $html = '<span class="badge bg-danger">Open</span>';
                    } else {
                        $html = '<span class="badge bg-success">Closed</span>';
                    }
                    return $html;
                })
                ->addColumn('date', function ($row) {
                    return format_date($row->date);
                })
               
                ->editColumn('observation', function ($row) {
                    return substr($row->observation, 0, 50) . '...';
                })
                ->editColumn('action_owner', function ($row) {
                    return ucwords($row->action_owner);
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        $sor_types = SorTypes::all();
        $page_title = 'Open Safety Observation Reports';

        //get all users who have added a sor
        $users = SOR::select('assignor_id')->distinct()->get();

        $users = User::whereIn('id', $users)->get();
        
        return view('admin/sors/open_sors', ['sor_types' => $sor_types, 'users' => $users, 'page_title' => $page_title]);
    }

    public function show($id)
    {
        $sor = SOR::findOrFail($id);
        $sor->load('media', 'assignor', 'type');
        return response()->json($sor);
    }

}
