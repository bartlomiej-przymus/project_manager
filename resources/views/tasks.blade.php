<div class="column is-half">
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
    @else
    <h6 class="is-small has-text-grey">Tasks</h6>
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
    </div>
</div>