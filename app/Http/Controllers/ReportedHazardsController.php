<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportedHazardsController extends Controller
{
    public function index()
    {
        return view('admin/reported_hazard');
    }
}
