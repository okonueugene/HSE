<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ICASController extends Controller
{
    public function index()
    {
        return view('admin/icas');
    }
}
