<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function index()
    {

        $users = \App\Models\User::orderBy('id', 'desc')->paginate(10);

        return view('admin/userslist')->with([
            'users' => $users,
        ]);
    }
}
