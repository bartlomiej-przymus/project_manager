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
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $attributes['settings'] = $this->getSettings($request);
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
        $settings = json_decode($project->settings, true);
        return view('projects.edit', compact('project'), compact('settings'));
    }

    public function update(Request $request, Project $project)
    {
        $attributes = $this->validateProject();
        $attributes['settings'] = $this->getSettings($request);
        $project->update($attributes);
        return redirect('/projects/'.$project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/home');
    }

    protected function getSettings($request)
    {
        $settings = $request->settings;
        $settingsArray = [
            'tasks' => in_array('tasks', $settings) ? true : false,
            'budget' => in_array('budget', $settings) ? true : false,
            'scheduler' => in_array('scheduler', $settings) ? true : false,
            'notifications' => in_array('notifications', $settings) ? true : false
        ];
        return json_encode($settingsArray);
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required']
        ]);
    }
}
