<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\SOR;
use App\Models\Icas;
use App\Models\Task;
use App\Models\User;
use App\Models\Permit;
use App\Models\Incident;
use App\Models\Supervisor;
use App\Models\Environment;
use App\Models\FirstResponder;
use App\Models\PersonelPresent;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //initialize data array to hold the data
        $data = array();
        //Live Number Of People On Site
        $data['attendance'] = User::all()->count();
        //Tasks Of The Day
        $data['tasks'] = Task::all()->count();
        //Incidents Recorded
        $data['incidents'] = Incident::all()->count();
        //Immediate Corrective Actions
        $data['icas'] = Icas::all()->count();
        //Safety Observation Record
        $data['sors'] = SOR::all()->count();
        // Supervisor
        $data['supervisor'] = Supervisor::orderBy('id', 'desc')->first()->name ?? 'No Supervisor Assigned';
        // Personnel Present
        $data['personells'] = PersonelPresent::orderBy('id', 'desc')->first()->number ?? 0;
        //Fire Marshal
        $data['fire_marshal'] = FirstResponder::orderBy('id', 'desc')->first()->name ?? 'No Fire Marshal Assigned';
        //First Aider
        $data['first_aider'] = FirstResponder::orderBy('id', 'desc')->first()->name ?? 'No First Aider Assigned';
        //Permits Applicable
        $data['permits'] = Permit::orderBy('id', 'desc')->count() ?? 0;
        //Environmental Concerns
        $data['environmental_concerns'] = Environment::orderBy('id', 'desc')->count();

        return response()->json($data);
    }
}
