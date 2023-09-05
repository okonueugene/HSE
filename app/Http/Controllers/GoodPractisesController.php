<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodPractisesController extends Controller
{
    public function index()
    {
        return view('admin/good_practises');
    }
}
