<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);

        // $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = \App\Models\types::all();
        $technologies = Technology::all();
        return view('admin.project.create', compact("project", "types","technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $img_path = Storage::put('uploads/projects', $data['image']);
        $data['image'] = $img_path;
        $data["author"] = Auth::user()->name;
        $data["date"] = Carbon::now();
        $newProject = Project::create($data);
        $newProject->technologies()->sync($data["technologies"]);
        return redirect()->route("admin.project.show", $newProject);
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('technologies');
        return view('admin.project.show', compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = \App\Models\types::all();
        $technologies = Technology::all();
    return view('admin.project.edit', compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);
        $project->technologies()->sync($request->input('technologies', []));
        return redirect()->route("admin.project.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
