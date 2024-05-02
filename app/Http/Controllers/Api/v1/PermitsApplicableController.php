<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Permit;

class PermitsApplicableController extends Controller
{
    public function index()
    {
        $permits = Permit::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $permits
            , 200,
        ]);
    }

}
