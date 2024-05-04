<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Supervisor;
use App\Http\Controllers\Controller;

class SupervisorsController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::orderBy('id', 'desc')->get();
        $supervisors->load('user');

        return response()->json([
            'data' => $supervisors
            , 200,
        ]);

    }

}
