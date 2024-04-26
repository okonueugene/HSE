<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Icas;
use Illuminate\Http\Request;

class IcaController extends Controller
{
    public function index()
    {
        $icas = Icas::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->get();

        //load media
        $icas->load('media');

        return response()->json([
            'data' => $icas
        ]);
    }
}
