<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Attendance extends Controller
{
 
    public function index()
    {
        $records = DB::table('attendances')->paginate(10);

        return view('admin/attendance', compact('records'));
    }
}
