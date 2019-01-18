@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">{{$project->title}}</h1>
    </header>
    <div class="card-content">
        <h6 class="is-small has-text-grey">Description</h6>
        <div class="content box">{{$project->description}}</div>
        <h6 class="is-small has-text-grey">Tasks</h6>
{{-- @if ($project->tasks->count())
<div class="box">
    @foreach ($project->tasks as $task)
        <form action="/completed-tasks/{{$task->id}}" method="POST">
            @if ($task->completed)
                @method('DELETE')
            @endif
            @csrf
            <label for="completed" class="checkbox {{$task->completed ? 'is-complete has-text-success' : 'has-text-danger'}}">
                <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                {{ $task->description }}
            </label>
        </form>
    @endforeach
</div>
@endif
    <form action="/projects/{{$project->id}}/tasks" method="POST" class="box">
        @csrf
        <div class="field">
            <label for="description" class="label">New Task</label>
            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
        
        @include('errors')

    </form>
    <form action="/projects/{{$project->id}}/tasks" method="POST" class="box">
        @csrf
        @method('DELETE')
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-warning">Clear Tasks</button>
            </div>
        </div>
    </form> --}}
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <a class="button is-medium some-space is-info" href="/projects/{{ $project->id }}/edit">Edit Project</a>
            <a class="button is-medium some-space is-warning" href="/home">Cancel</a>
        </div>
    </footer>
</div>
@endsection