<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FirstAidCaseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:view_first_aid_case')->only(['index', 'show']);
    $this->middleware('permission:edit_first_aid_case')->only(['update']);
    $this->middleware('permission:delete_first_aid_case')->only(['destroy']);
  }

  public function index(Request $request)
  {
    if ($request->ajax()) {
      $query = Incident::where('incident_type_id', 2)->orderBy('id', 'desc');

      //chech if filters are applied
      if (!empty($request->filters)) {
        //check for start_date and end_date
        if (!empty($request->filters['start_date']) && !empty($request->filters['end_date'])) {
          $query->whereBetween('incident_date', [$request->filters['start_date'], $request->filters['end_date']]);
        }

        //check for investigation status
        if (!empty($request->filters['investigation'])) {
          $query->where('investigation_status', $request->filters['investigation']);
        }

        //check for status
        if (!empty($request->filters['reporting_done'])) {
          $query->where('incident_status', $request->filters['reporting_done']);
        }
      }

      return DataTables::of($query)
        ->addColumn('action', function ($row) {
          $row->load('media');
          $html =
            '
            <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                data-bs-display="static" aria-expanded="false">Action
              </button>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                    data-bs-target="#showModal" onclick="showDataModal(' .
            $row->id .
            ')">View</a>
                <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal"
                    data-bs-target="#updateModal" data-case-id="(' .
            $row->id .
            ')" onclick="editcase(this)">Edit</a>
                </li>

                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick="deleteData(' .
            $row->id .
            ')">Delete</a>
                  Delete
                  </a>
                </li>
              </ul>
            </div>
            ';
          return $html;
        })

        ->addColumn('incident_type_name', function ($row) {
          return ucwords(str_replace('_', ' ', $row->incidentType->incident_type)) ?? 'N/A';
        })

        ->addColumn('serial_no', function ($row) {
          static $serialNumber = 0;
          $serialNumber++;
          return $serialNumber;
        })

        ->editColumn('investigation_status', function ($row) {
          $html =
            $row->investigation_status == 'open'
              ? '<span class="badge bg-success">Open</span>'
              : '<span class="badge bg-danger">Closed</span>';
          return $html;
        })

        ->editColumn('incident_status', function ($row) {
          $html =
            $row->incident_status == 'yes'
              ? '<span class="badge bg-success">Done</span>'
              : '<span class="badge bg-danger">Not Done</span>';
          return $html;
        })
        ->editColumn('incident_date', function ($row) {
          return format_date($row->incident_date);
        })
        ->editColumn('incident_description', function ($row) {
          return nl2br($row->incident_description);
        })
        ->rawColumns(['action', 'investigation_status', 'incident_status', 'incident_description'])
        ->make(true);
    }
    $page_title = 'First Aid Cases';

    return view('admin/incidents/first_aid_case', compact('page_title'));
  }

  public function show($id)
  {
    $firstaidcase = Incident::findOrFail($id);
    $firstaidcase->load('media');

    return response()->json($firstaidcase);
  }

  public function update(Request $request, $id)
  {
    $firstaidcase = Incident::findOrFail($id);

    $firstaidcase->incident_description = $request->input('description');
    $firstaidcase->incident_date = $request->input('date');
    $firstaidcase->incident_status = $request->input('status');
    $firstaidcase->investigation_status = $request->input('investigation');

    // Upload media
    if ($request->hasFile('media')) {
      $firstaidcase->addMediaFromRequest('media')->toMediaCollection('firstaidcases');
    }

    $firstaidcase->save();

    return response()->json($firstaidcase);
  }

  public function destroy($id)
  {
    $firstaidcase = Incident::findOrFail($id);
    $firstaidcase->delete();

    return response()->json(['success' => 'First Aid Case deleted successfully.']);
  }
}
