<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidentsController extends Controller
{

    public function index()
    {
        $incident_types = DB::table('incident_type')->orderBy('id', 'asc')->get()->pluck('incident_type', 'id')->toArray();

        return response()->json($incident_types);
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
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $incident->addMediaFromRequest('images')->toMediaCollection('incident_images');
            }
        }

        $incident->save();

        return response()->json(['message' => 'Incident created successfully']);
    }

    public function openIncidents()
    {
        $incidents = Incident::where('incident_status', 'no')->where('investigation_status', 'open')->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

    public function nearMiss()
    {
        $incidents = Incident::where('incident_type_id', 1)->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

    public function firstAidCase()
    {
        $incidents = Incident::where('incident_type_id', 2)->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

    public function medicalTreatmentCase()
    {
        $incidents = Incident::where('incident_type_id', 3)->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

    public function lostTimeAccident()
    {
        $incidents = Incident::where('incident_type_id', 4)->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

    public function sif()
    {
        $incidents = Incident::where('incident_type_id', 5)->orderBy('created_at', 'desc')->get();

        $incidents->load('media', 'user', 'incidentType');

        return response()->json(['data' => $incidents]);
    }

}
