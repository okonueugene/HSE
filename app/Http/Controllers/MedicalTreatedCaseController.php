<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class MedicalTreatedCaseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:view_medical_treated_case')->only(['index', 'show']);
    $this->middleware('permission:edit_medical_treated_case')->only(['update']);
    $this->middleware('permission:delete_medical_treated_case')->only(['destroy']);
  }

  public function index(Request $request)
  {
    if ($request->ajax()) {
      $query = Incident::where('incident_type_id', 3)
        ->with('media')
        ->orderBy('id', 'desc');

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
            <li>
              <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showModal"
                onclick="showDataModal(' .
            $row->id .
            ')">View</a>
            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal"
                data-medicaltreatedcase-id="' .
            $row->id .
            '" onclick="editmedicaltreatedcase(this)">Edit</a>
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

    $page_title = 'Medical Treated Cases';

    return view('admin/incidents/medical_treated_case', compact('page_title'));
  }

  public function show($id)
  {
    $medicaltreatedcase = Incident::findOrFail($id);
    $medicaltreatedcase->load('media');

    return response()->json($medicaltreatedcase);
  }

  public function update(Request $request, $id)
  {
    $medicaltreatedcase = Incident::findOrFail($id);

    $medicaltreatedcase->incident_description = $request->input('description');
    $medicaltreatedcase->incident_date = $request->input('date');
    $medicaltreatedcase->incident_status = $request->input('status');
    $medicaltreatedcase->investigation_status = $request->input('investigation');

    $medicaltreatedcase->save();

    return response()->json($medicaltreatedcase);
  }

  public function destroy($id)
  {
    $medicaltreatedcase = Incident::findOrfail($id);
    $medicaltreatedcase->delete();

    return response()->json(['success' => 'Medical Treated Case deleted successfully.']);
  }
}
