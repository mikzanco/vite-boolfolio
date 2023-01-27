<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projects;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::orderBy('id', 'desc')->paginate(10);
        $direction = 'desc';
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function typologies_project(){
        $typologies = Typology::all();
        return view('admin.projects.project_type_list', compact('typologies'));
    }

    public function orderby($column, $direction){

        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Projects::orderby($column, $direction)->paginate(10);

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $route = route('projects.store');
        // $method = 'POST';
        // $projects = null;
        // $title = 'Nuovo Progetto';
        $typologies = Typology::all();
        return view('admin.projects.create',  compact('typologies'));
        // compact('route', 'method', 'title')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $project_data = $request->all();


        $project_data['slug'] = Projects::generateSlug($project_data['name']);

        // dd($project_data);

        if(array_key_exists('cover_image', $project_data)){

            $project_data['cover_image_original'] = $request->file('cover_image')->getClientOriginalName();
            $project_data['cover_image'] = Storage::put('uploads', $project_data['cover_image']);
        }
        // dd($project_data);



        // $new_project = new Projects();
        // $new_project->fill($project_data);
        // $new_project->save();

        $new_project = Projects::create($project_data);
        return redirect()->route('admin.projects.show', $new_project)->with('message', 'Progetto creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $project)
    {

        // $projects = Projects::find($projects);
        $projects = $project;
        return view('admin.projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $project)
    {

        $typologies = Typology::all();
        $projects = $project;
        return view('admin.projects.edit', compact('projects', 'typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRequest  $request
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Projects $project)
    {
        $project_data = $request->all();
        if($project_data['name'] != $project->name ){
            $project_data['slug'] = Projects::generateSlug($project_data['name']);

        }else{
            $project_data['slug'] = $project->slug;
        }

        if(array_key_exists('cover_image', $project_data)){
            if($project->cover_image){
                Storage::disk('public')->delete($project->cover_image);
            }

            $project_data['cover_image_original'] = $request->file('cover_image')->getClientOriginalName();
            $project_data['cover_image'] = Storage::put('uploads', $project_data['cover_image']);
        }

        $project->update($project_data);
        return redirect()->route('admin.projects.show', $project)->with('message', 'Progetto aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $project)
    {
        if($project->cover_image){
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('delete', 'Progetto eliminato');
    }
}



