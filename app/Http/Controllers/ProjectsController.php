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
        $settings = $request->settings;
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $settingsArray = [
            'tasks' => in_array('tasks', $settings) ? true : false,
            'budget' => in_array('budget', $settings) ? true : false,
            'scheduler' => in_array('scheduler', $settings) ? true : false,
            'notifications' => in_array('notifications', $settings) ? true : false
        ];
        $attributes['settings'] = json_encode($settingsArray);
        Project::create($attributes);
        return redirect('/home');
    }

    public function show(Project $project, Task $task)
    {
        $settings = json_decode($project->settings, true);
        return view('projects.show', compact('project'), compact('settings'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($this->validateProject());
        return redirect('/projects/'.$project->id);
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
