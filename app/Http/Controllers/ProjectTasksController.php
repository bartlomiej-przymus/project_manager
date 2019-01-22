<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Request $request, Project $project)
    {
        Task::create([
            'description' => $request->description,
            'completed' => false,
            'project_id' => $project->id,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        return back();
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        dd($task->project_id);
        $task->delete();
        return back();
    }
}
