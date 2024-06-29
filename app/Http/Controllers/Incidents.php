<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\IncidentType;
use Yajra\DataTables\Facades\DataTables;

class Incidents extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_incident')->only(['index', 'show']);
        $this->middleware('permission:add_incident')->only(['store']);
        $this->middleware('permission:edit_incident')->only(['update']);
        $this->middleware('permission:delete_incident')->only(['destroy']);
    }

    public function index()
    {
        $incident_types = DB::table('incident_type')->get();

        return view('admin/incidents/create', ['incident_types' => $incident_types]);
    }

    public function store(Request $request)
    {
        $rules = [
            'incident_type_id' => 'required',
            'investigation_status' => 'required',
            'incident_description' => 'required',
            'incident_status' => 'required',
        ];

        $messages = [
            'incident_type_id.required' => 'Incident type is required',
            'investigation_status.required' => 'Investigation status is required',
            'incident_description.required' => 'Incident description is required',
            'incident_status.required' => 'Incident status is required',
        ];

        $this->validate($request, $rules, $messages);

        $incident = new Incident();
        $incident->user_id = auth()->user()->id;
        $incident->incident_type_id = $request->input('incident_type_id');
        $incident->incident_date = date('Y-m-d');
        $incident->investigation_status = $request->input('investigation_status');
        $incident->incident_description = $request->input('incident_description');
        $incident->incident_status = $request->input('incident_status');

        // Upload media
        if ($request->hasFile('media')) {
            $incident->addMediaFromRequest('media')->toMediaCollection('incident_images');
        }

        $incident->save();

        return redirect()->route('incidents')->with('success', 'Incident has been added successfully');
    }

    public function openIncidents()
    {

        if (request()->ajax()) {
            $incidents = Incident::where('incident_status', 'no')->where('investigation_status', 'open')->orderBy('incidents.created_at', 'desc');
            
            // filters
            if(!empty(request()->filters)){
                if(!empty(request()->filters['start_date'] && !empty(request()->filters['end_date']))){
                    $incidents->whereDate('incident_date','>=',request()->filters['start_date'])->whereDate('incident_date','<=',request()->filters['end_date']);
                }

                if(!empty(request()->filters['incident_type'])){
                    $incidents->where('incident_type_id',request()->filters['incident_type']);
                }

                if(!empty(request()->filters['investigation'])){
                    $incidents->where('investigation_status',request()->filters['investigation']);
                }

                if(!empty(request()->filters['reporting_done'])){
                    $incidents->where('incident_status',request()->filters['reporting_done']);
                }
                
            }
            
            return DataTables::of($incidents)
                ->addColumn(
                    'action',
                    function ($row) {
                        $row->load('media', 'user', 'incidentType');
                        $html = '
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">Action
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-incident=\'' .$row. '\'
                                        data-bs-target="#viewIncidentModal">View</a>
                                </li>
                            </ul>
                        </div>
                    ';
                        return $html;
                    }
                )

                ->addColumn('incident_type_name', function ($row) {
                    return ucwords(str_replace('_',' ',$row->incidentType->incident_type)) ?? 'N/A'; 
                })

                ->addColumn('serial_no', function ($row) {
                    static $serialNumber = 0;
                    $serialNumber++;
                    return $serialNumber;
                })

                ->editColumn('investigation_status', function ($row) {
                    $html = $row->investigation_status == 'open' ? '<span class="badge bg-success">Open</span>' : '<span class="badge bg-danger">Closed</span>';
                    return $html;
                })

                ->editColumn('incident_status', function ($row) {
                    $html = $row->incident_status == 'yes' ? '<span class="badge bg-success">Done</span>' : '<span class="badge bg-danger">Not Done</span>';
                    return $html;
                })
                ->editColumn('incident_date',function($row){
                    return format_date($row->incident_date);
                })
                ->editColumn('incident_description',function($row){
                    return nl2br($row->incident_description);
                })
                ->rawColumns(['action', 'investigation_status', 'incident_status', 'incident_description'])
                ->make(true);
        }

        $page_title = 'Open Incidents';
        $incident_types = IncidentType::all();

        return view('admin/incidents/open_incidents',compact('page_title','incident_types'));
    }
}
