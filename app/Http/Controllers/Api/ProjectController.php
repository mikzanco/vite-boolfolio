<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Projects::all();
        return response()->json(compact('projects'));
    }
}
