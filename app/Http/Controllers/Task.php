<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task extends Controller
{
    //
    public function index()
    {
        $task = DB::table('tasks')->paginate('10');
        
        return view('admin/task', compact('task'));
    }
}
