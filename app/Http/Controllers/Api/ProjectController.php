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

    public function show($slug){

        $projects = Projects::where('slug', $slug)->first();

        if($projects->cover_image){
            $projects->cover_image = url("storage/" . $projects->cover_image);
        }else{
            $projects->cover_image = url("storage/uploads/image-placeholder.jpg");
        }

        return response()->json($projects);
    }
}
