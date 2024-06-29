<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SOR;
use App\Models\SorTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BadPractisesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:view_bad_practise')->only(['index', 'show']);
    $this->middleware('permission:edit_bad_practise')->only(['update']);
    $this->middleware('permission:delete_bad_practise')->only(['destroy']);
  }

  public function index(Request $request)
  {
    if ($request->ajax()) {
      $query = SOR::where('type_id', 1)->orderBy('id', 'desc');
      //filters

      if (!empty($request->filters)) {
        $filters = $request->filters;

        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
          $query->whereBetween('date', [$filters['start_date'], $filters['end_date']]);
        }

        if ($filters['status'] !== null && $filters['status'] !== '') {
          $query->where('status', $filters['status']);
        }

        if (!empty($filters['assignor'])) {
          $query->where('assignor_id', $filters['assignor']);
        }
      }

      return DataTables::of($query)
        ->addColumn('action', function ($row) {
          $row->load('media', 'assignor', 'type');
          $html =
            '
    <div class="btn-group">
      <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
        data-bs-display="static" aria-expanded="false">Action
      </button>
      <ul class="dropdown-menu">
        <li>
          <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showModal"
            onclick="showDataModal(' .
            $row->id .
            ')">
            View
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal"
            data-badpractise-id="' .
            $row->id .
            '" onclick="editbadpractise(this)">
            Edit
          </a>
        </li>

        <li>
          <a href="javascript:void(0)" class="dropdown-item" onclick="deleteData(' .
            $row->id .
            ')">
            Delete
          </a>
        </li>
      </ul>
    </div>
    ';
          return $html;
        })

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
        ->editColumn('status', function ($row) {
          $html = '';
          if ($row->status == 0) {
            $html = '<span class="badge bg-danger">Open</span>';
          } else {
            $html = '<span class="badge bg-success">Closed</span>';
          }
          return $html;
        })
        ->editColumn('date', function ($row) {
          return format_date($row->date);
        })

        ->editColumn('observation', function ($row) {
          return substr($row->observation, 0, 50) . '...';
        })
        ->editColumn('action_owner', function ($row) {
          return ucwords($row->action_owner);
        })
        ->rawColumns(['action', 'status', 'observation', 'action_owner'])
        ->make(true);
    }

    $sor_types = SorTypes::all();
    $page_title = 'Bad Practises';

    //get all users who have added a sor
    $users = SOR::select('assignor_id')
      ->distinct()
      ->get();

    $users = User::whereIn('id', $users)->get();

    return view('admin/sors/bad_practises', compact('sor_types', 'users', 'page_title'));
  }

  public function show($id)
  {
    $badpractice = SOR::findOrfail($id);
    $badpractice->load('media');

    return response()->json($badpractice);
  }

  public function update(Request $request, $id)
  {
    $badpractice = SOR::findOrfail($id);

    $badpractice->observation = $request->observation;
    $badpractice->status = $request->status;
    $badpractice->steps_taken = $request->steps_taken;
    $badpractice->date = $request->date;

    $badpractice->save();
  }

  public function destroy($id)
  {
    $badpractice = SOR::findOrFail($id);
    $badpractice->delete();

    return response()->json(['message' => 'Bad Practice deleted successfully.']);
  }
}
