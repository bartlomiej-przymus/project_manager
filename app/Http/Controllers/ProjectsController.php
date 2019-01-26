<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('/home', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $jsonSettings = json_encode($request->settings);
        //dd($jsonSettings);
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $attributes['settings'] = $jsonSettings;
        Project::create($attributes);
        return redirect('/home');
    }

    public function show(Project $project, Task $task)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($this->validateProject());
        return redirect('/home');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/home');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required']
        ]);
    }
}
