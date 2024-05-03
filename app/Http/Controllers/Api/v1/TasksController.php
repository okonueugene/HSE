<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TasksResource;

class TasksController extends Controller
{
    public function index()
    {
        return Task::orderBy('id', 'desc')->where('user_id', auth()->id())->get();
    }
}
