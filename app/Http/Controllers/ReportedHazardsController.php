<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SOR;
use App\Models\SorTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportedHazardsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:view_reported_hazard')->only(['index', 'show']);
    $this->middleware('permission:edit_reported_hazard')->only(['update']);
    $this->middleware('permission:delete_reported_hazard')->only(['destroy']);
  }

  public function index(Request $request)
  {
    if ($request->ajax()) {
      $query = SOR::where('type_id', 3)->orderBy('id', 'desc');
      // filters
      if (!empty(request()->filters)) {
        $filters = request()->filters;
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
                data-hazard-id="' .
            $row->id .
            '" onclick="editHazard(this)">
                Edit
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" class="dropdown-item" onclick="deleteHazard(' .
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
    $page_title = 'Reported Hazards';

    //get all users who have added a sor
    $users = SOR::select('assignor_id')
      ->distinct()
      ->get();

    $users = User::whereIn('id', $users)->get();

    return view('admin/sors/reported_hazard', [
      'sor_types' => $sor_types,
      'users' => $users,
      'page_title' => $page_title,
    ]);
  }

  public function show($id)
  {
    $reportedhazard = SOR::findOrfail($id);
    $reportedhazard->load('media');

    return response()->json($reportedhazard);
  }

  public function update(Request $request, $id)
  {
    //validate the data
    $this->validate($request, [
      'observation' => 'required',
      'status' => 'required',
      'steps_taken' => 'required',
      'date' => 'required',
    ]);

    $reportedhazard = SOR::findOrfail($id);

    $reportedhazard->observation = $request->input('observation');
    $reportedhazard->status = $request->input('status');
    $reportedhazard->date = $request->input('date');
    $reportedhazard->steps_taken = $request->input('steps_taken');

    $reportedhazard->save();

    return response()->json(['success' => 'Reported Hazard updated successfully.']);
  }

  public function destroy($id)
  {
    $reportedhazard = SOR::findOrfail($id);
    $reportedhazard->delete();

    return response()->json(['success' => 'Good Practice deleted successfully.']);
  }
}
