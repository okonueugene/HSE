<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitsController extends Controller
{
    public function index()
    {
      $permits = Permit::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->get();

      $permits->load('user');

        return response()->json([
            'data' => $permits
        ]);
    }
}
