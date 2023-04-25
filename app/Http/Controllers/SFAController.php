<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SFAController extends Controller
{
    public function index()
    {
        return view('admin/sfa');
    }
}
