<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function index()
    {
        return view('admin/userslist');
    }
}
