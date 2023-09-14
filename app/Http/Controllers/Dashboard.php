<?php

namespace App\Http\Controllers;

use App\Models\SOR;
use App\Models\Icas;
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
        $data['bad_practises'] = SOR::where('type_id', 1)->count();
        $data['good_practises'] = SOR::where('type_id', 2)->count();
        $data['reported_hazards'] = SOR::where('type_id', 3)->count();
        $data['icas'] = Icas::count();
        $data['suggested_improvements'] = SOR::where('type_id', 4)->count();
        $data['incidents'] = Incident::count();




        return view('admin/dashboard', compact('data'));
    }
}
