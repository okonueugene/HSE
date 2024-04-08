<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\FirstResponder;
use App\Models\Icas;
use App\Models\Incident;
use App\Models\PersonelPresent;
use App\Models\SOR;
use App\Models\Supervisor;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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
         $data['supervisor'] = Supervisor::where('created_at', '>=', Carbon::today())->first()->name ?? 'No Supervisor Assigned';
         // Personnel Present
         $data['personells'] = PersonelPresent::where('created_at', '>=', Carbon::today())->first()->number ?? 0;
         //Fire Marshal
         $data['fire_marshal'] = FirstResponder::where('created_at', '>=', Carbon::today())->where('type', 'fire_marshal')->first()->name ?? 'No Fire Marshal Assigned';
         //First Aider
         $data['first_aider'] = FirstResponder::where('created_at', '>=', Carbon::today())->where('type', 'first_aider')->first()->name ?? 'No First Aider Assigned';
 
        return response()->json($data);
    }
}
