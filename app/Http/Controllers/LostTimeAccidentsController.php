<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LostTimeAccidentsController extends Controller
{
    public function index()
    {
        return view('admin/lost_time_accidents');
    }
}
