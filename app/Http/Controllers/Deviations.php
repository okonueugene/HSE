<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Deviations extends Controller
{
    //
    public function index()
    {

        $deviations= DB::table('guards')->paginate('10');

        return view('admin/deviations', compact('deviations'));
    }
}
