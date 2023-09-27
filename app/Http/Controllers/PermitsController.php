<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PermitsController extends Controller
{
    public function index()
    {
        $permits = DB::table('password_reset_tokens')->get();
        return view('admin/permits')->with('permits', $permits);
    }
}
