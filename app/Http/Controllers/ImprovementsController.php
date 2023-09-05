<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImprovementsController extends Controller
{
    public function index()
    {
        return view('admin/improvements');
    }
}
