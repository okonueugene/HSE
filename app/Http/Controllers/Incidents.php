<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

        return view('admin/incident', ['incident_types' => $incident_types]);

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

        dd($request->all());

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
        $incidents = Incident::where('incident_status', 'no')->where('investigation_status', 'open')->orderBy('created_at', 'desc')->paginate(10);

        $incidents->load('media', 'user', 'incidentType');

        return view('admin/open_incidents', ['incidents' => $incidents]);
    }
}
