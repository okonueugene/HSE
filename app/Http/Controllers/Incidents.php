<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Incidents extends Controller
{
    public function index()
    {
        $incidents = [];
        
        return view('admin/incident', compact('incidents'));
    }
}
