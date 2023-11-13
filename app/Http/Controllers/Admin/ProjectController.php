<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id')->paginate(5);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');
        //dd($val_data);

        if ($request->has('cover_image')) {
            $file_path = Storage::put('projects_images', $request->cover_image);
            $val_data['cover_image'] = $file_path;
        }

        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if ($project) {
            return view('admin.projects.show', compact('project'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        if ($request->has('cover_image') && $project->cover_image) {

            Storage::delete($project->cover_image);

            $newImageFile = $request->cover_image;
            $file_path = Storage::put('projects_images', $newImageFile);
            $val_data['cover_image'] = $file_path;
        }

        $project->update($val_data);

        return to_route('admin.projects.index')->with('message', 'Welldone! project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();

        return to_route('admin.projects.index')->with('message', 'Welldone! Project deleted successfully');
    }
}
