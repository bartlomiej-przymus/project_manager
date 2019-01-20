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
        {{-- Adding tasks form here: --}}
        @if ($project->tasks->count())
            <div class="content box">
                @foreach ($project->tasks as $task)
                    <form action="/projects/{{$task->project_id}}/task/{{$task->id}}" method="POST">
                        @if ($task->completed)
                            @method('DELETE')
                        @endif
                        @csrf
                        <label for="completed" class="checkbox {{$task->completed ? 'is-complete has-text-success' : 'has-text-danger'}}">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                            {{ $task->description }}
                        </label>
                    </form>
                    <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="delete"></button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        @endif
        <div class="content box">
            <form action="/projects/{{$project->id}}/tasks" method="POST">
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
            
        </div> {{-- End of add/delete task form (content box element) --}}
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <a class="button is-medium some-space is-info" href="/projects/{{ $project->id }}/edit">Edit Project</a>
            <a class="button is-medium some-space is-warning" href="/home">Cancel</a>
        </div>
    </footer>
</div>
@endsection