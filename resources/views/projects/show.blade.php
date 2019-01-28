@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">{{$project->title}}</h1>
    </header>
    <div class="card-content">
        <h6 class="is-small has-text-grey">Description</h6>
        <div class="content box">{{$project->description}}</div>
        <h6 class="is-small has-text-grey">Settings</h6>
            <div class="field is-grouped is-grouped-multiline space-top">
                @foreach ($settings as $sName => $sValue)
                    <div class="control">
                        <div class="tags has-addons">
                            <span class="tag is-dark">{{ $sName }}</span>
                            <span class="tag @if($sValue) is-success @else is-danger @endif">
                                @if ($sValue) on @else off @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        {{-- Adding tasks form here: --}}
        @if ($project->tasks->count())
            <h6 class="is-small has-text-grey">Tasks</h6>
            <div class="content box">
                @foreach ($project->tasks as $task)
                    <form action="/taskstatus/{{ $task->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="field is-horizontal">
                            <div class="control">
                                <label for="completed" class="checkbox {{$task->completed ? 'is-complete has-text-success' : 'has-text-danger'}}">
                                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                                    {{ $task->description }}
                                </label>
                            </div>
                    </form>
                    {{-- This is to delete particular task altogether from project --}}
                    <form action="/task/{{$task->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <div class="control delete-icon">
                                <button type="submit" class="delete"></button>
                            </div>
                        </div>  {{-- field is-horizontal ends here --}}
                    </form>
                @endforeach
            </div>
        @endif
        <div class="content box">
            <form action="/projects/{{ $project->id }}/task" method="POST">
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