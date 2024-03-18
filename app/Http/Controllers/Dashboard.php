<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SOR;
use App\Models\Icas;
use App\Models\Task;
use App\Models\User;
use App\Models\Incident;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\PersonelPresent;
use App\Models\FirstResponder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    //
    public function index()
    {
        //initialize data array to hold the data
        $data = array();
        //Live Number Of People On Site
        $data['attendance'] = User::where('last_login_at', '>=', Carbon::today())->count();
        //Tasks Of The Day
        $data['tasks'] = Task::where('created_at', '>=', Carbon::today())->count();
        //Incidents Recorded
        $data['incidents'] = Incident::where('created_at', '>=', Carbon::today())->count();
        //Immediate Corrective Actions
        $data['icas'] = Icas::where('created_at', '>=', Carbon::today())->count();
        //Safety Observation Record
        $data['sors'] = SOR::where('created_at', '>=', Carbon::today())->count();
        // Supervisor
        $data['supervisor'] = Supervisor::where('created_at', '>=', Carbon::today())->first()->name;
        // Personnel Present
        $data['personells'] = PersonelPresent::where('created_at', '>=', Carbon::today())->first()->number;
        //Fire Marshal
        $data['fire_marshal'] = FirstResponder::where('created_at', '>=', Carbon::today())->where('type', 'fire_marshal')->first()->name ?? 'No Fire Marshal Assigned';
        //First Aider
        $data['first_aider'] = FirstResponder::where('created_at', '>=', Carbon::today())->where('type', 'first_aider')->first()->name ?? 'No First Aider Assigned';

        return view('admin/dashboard', compact('data'));
    }
}
