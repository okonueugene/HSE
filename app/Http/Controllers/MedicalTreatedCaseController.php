<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalTreatedCaseController extends Controller
{
    public function index()
    {
        return view('admin/medical_treated_case');
    }
}
