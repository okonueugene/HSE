<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\IncidentType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class NearMissController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:view_near_miss')->only(['index', 'show']);
    $this->middleware('permission:edit_near_miss')->only(['update']);
    $this->middleware('permission:delete_near_miss')->only(['destroy']);
  }

  public function index(Request $request)
  {
    $query = Incident::where('incident_type_id', 1)->orderBy('id', 'desc');

    if (request()->ajax()) {
      //check if filter is applied
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
        if (!empty($request->filters['status'])) {
          $query->where('incident_status', $request->filters['status']);
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
            ')">View
              </a>
            <li>
              <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal"
                data-nearmiss-id="' .
            $row->id .
            '" onclick="editnearmiss(this)">Edit
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" class="dropdown-item" onclick="deleteData(' .
            $row->id .
            ')">Delete</a>

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

    $incident_types = IncidentType::all();
    $page_title = 'Near Miss Incidents';

    return view('admin/incidents/near_miss', compact('incident_types', 'page_title'));
  }

  public function show($id)
  {
    $nearmiss = Incident::findOrfail($id);
    $nearmiss->load('media');

    return response()->json($nearmiss);
  }

  public function update(Request $request, $id)
  {
    $nearmiss = Incident::findOrfail($id);

    $nearmiss->incident_description = $request->input('description');
    $nearmiss->incident_date = $request->input('date');
    $nearmiss->incident_status = $request->input('status');
    $nearmiss->investigation_status = $request->input('investigation');

    // // Upload media
    // if ($request->hasFile('media')) {
    //     $nearmiss->addMediaFromRequest('media')->toMediaCollection('nearmisses');
    // }

    $nearmiss->save();

    return response()->json(['success' => 'Near Miss updated successfully.']);
  }

  public function destroy($id)
  {
    $nearmiss = Incident::findOrfail($id);
    $nearmiss->delete();

    return response()->json(['success' => 'Near Miss deleted successfully.']);
  }
}
