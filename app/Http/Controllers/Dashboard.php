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
        $attendance = DB::table('attendances')->where('day', date('Y-m-d'))->count();
        $deviations = DB::table('guards')->where('created_at', date('Y-m-d'))->count();
        $incidents = DB::table('incidents')->where('date', date('Y-m-d'))->count();
        $tasks = DB::table('tasks')->where('date', date('Y-m-d'))->count();
        

        return view('admin/dashboard',compact('attendance','deviations','incidents','tasks'));
    }
}
