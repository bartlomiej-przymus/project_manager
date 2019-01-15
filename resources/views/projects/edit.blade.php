@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header-title">
        Edit Project
    </header>
    <div class="card-content">
        <form action="" method="post">
            @method('PATCH')
            @csrf
            <h6 class="is-small has-text-grey">Project Details</h6>
            <div class="content box">
                <div class="field">
                    <div class="control">
                        <label for="title" class="label">Title</label>
                        <input type="text" name="title" class="input" value="{{ $project->title }}">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label for="description" class="label">Description</label>
                        <input type="text" name="description" class="input" value="{{ $project->description }}">
                    </div>
                </div>
                <br>
                <div class="field is-horizontal">
                    <div class="control">
                        Enable Project Tasks:
                        <label class="switch">
                            <input name="settings" id="tasks" type="checkbox" value="tasks" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="control">
                        Enable Project Budget:
                        <label class="switch">
                            <input name="settings" id="tasks" type="checkbox" value="tasks" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="control">
                        Enable Project Scheduler:
                        <label class="switch">
                            <input name="settings" id="tasks" type="checkbox" value="tasks" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="control">
                        Enable Project Notifications:
                        <label class="switch">
                            <input name="settings" id="tasks" type="checkbox" value="tasks" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer class="card-footer">
        <a href="#" class="card-footer-item">Save Project</a>
        <a href="/projects/{{ $project->id }}" class="card-footer-item">Cancel</a>
        <a href="#" class="card-footer-item">Delete Project</a>
    </footer>
</div>
    
@endsection