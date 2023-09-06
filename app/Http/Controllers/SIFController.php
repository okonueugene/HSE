<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SIFController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        // Check if a search query is present

        $search = $request->input('search');

        $query = Incident::where('incident_type_id', 5)->with('media');

        // Apply search filter if a query is provided

        if ($search) {

            $query->where('description', 'like', '%' . $search . '%');

        }

        $sifs = $query->paginate($perPage);

        return view('admin/sif')->with([

            'sifs' => $sifs,

            'search' => $search, // Pass search query to the view

        ]);
    }
}