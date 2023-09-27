<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SOR;
use App\Models\Icas;
use App\Models\Task;
use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
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

        return view('admin/dashboard', compact('data'));
    }
}
