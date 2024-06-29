<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Attendance extends Controller
{
 
    public function index()
    {
        $records =[];

        return view('admin/attendance/index', compact('records'));
    }
}
