<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SORController extends Controller
{
    
    public function index()
    {
        //extend the layout
        return view('admin/sor');
        
        
    }
}
