<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    //
    public function index()
    {

        //count attendance for today
        $attendance = [];
        $deviations = [];
        $incidents = [];
        $tasks = [];
        

        return view('admin/dashboard',compact('attendance','deviations','incidents','tasks'));
    }
}
