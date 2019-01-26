@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header-title">
        Edit Project
    </header>
    <div class="card-content">
    <form action="/projects/{{ $project->id }}" method="post">
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
                </div>
            <h6 class="is-small has-text-grey">Project Settings</h6>
            <div class="content box">
                <div class="field is-horizontal">
                    <nav class="level">
                        <div class="level-left">
                            <div class="control">
                                <label class="switch">
                                    <input name="tasks" id="tasks" type="checkbox" value="on" checked>
                                    <span class="slider round"></span>
                                </label>
                                - Enable Tasks
                            </div>
                        </div>
                        <div class="level-left">
                            <div class="control">
                                <label class="switch">
                                    <input name="budget" id="tasks" type="checkbox" value="on" checked>
                                    <span class="slider round"></span>
                                </label>
                                - Enable Budget
                            </div>
                        </div>
                        <div class="level-left">
                            <div class="control">
                                <label class="switch">
                                    <input name="scheduler" id="tasks" type="checkbox" value="on" checked>
                                    <span class="slider round"></span>
                                </label>
                                - Enable Scheduler
                            </div>
                        </div>
                        <div class="level-item">
                            <div class="control">
                                <label class="switch">
                                    <input name="notifications" id="tasks" type="checkbox" value="on" checked>
                                    <span class="slider round"></span>
                                </label>
                                - Enable Notifications:
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <input type="submit" class="button is-medium some-space is-success" value="Save"/>
        </form> <!-- end of save project form -->
            <a href="/projects/{{ $project->id }}" class="button is-medium some-space is-info">Cancel</a>
            <form action="/projects/{{$project->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="button is-medium some-space is-danger" value="Delete"/>
            </form>
            
        </div>
    </footer>    
        
</div>
    
@endsection