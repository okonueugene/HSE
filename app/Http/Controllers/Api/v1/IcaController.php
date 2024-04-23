<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Icas;
use Illuminate\Http\Request;

class IcaController extends Controller
{
    public function index()
    {
        $icas = Icas::all();

        return response()->json([
            'data' => $icas
        ]);
    }
}
