<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Incidents extends Controller
{
    public function index()
    {
        $incidents = DB::table('incidents')->paginate('10');
        
        return view('admin/incident', compact('incidents'));
    }
}
