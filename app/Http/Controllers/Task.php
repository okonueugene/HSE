<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task extends Controller
{
    //
    public function index()
    {
        $task = [];
        
        return view('admin/task', compact('task'));
    }
}
