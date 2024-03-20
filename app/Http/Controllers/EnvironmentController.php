<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    //

    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view_environment');
        $this->middleware('permission:add_environment');
        $this->middleware('permission:edit_environment');
        $this->middleware('permission:delete_environment');
    }

    public function index()
    {

        $concerns = [];

        return view('admin/environment_concerns')->with('concerns', $concerns);
    }

    public function environmentalPolicyChecklist()
    {
        return view('admin/environmental_policy_checklist');
    }

    
}
