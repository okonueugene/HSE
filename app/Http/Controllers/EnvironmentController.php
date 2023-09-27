<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    //

    public function index()
    {

        $concerns = [];

        return view('admin/environment_concerns')->with('concerns', $concerns);
    }
}
