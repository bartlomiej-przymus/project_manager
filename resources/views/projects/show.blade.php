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
        <div class="columns">
            @if ($settings['tasks'])
            @include('tasks')
            @endif
            @if ($settings['budget'])
            @include('budget')
            @endif
            @if ($settings['notifications'])
            @include('notifications')
            @endif
            @if ($settings['scheduler'])
            @include('scheduler')
            @endif
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <a class="button is-medium some-space is-info" href="/projects/{{ $project->id }}/edit">Edit Project</a>
            <a class="button is-medium some-space is-warning" href="/home">Cancel</a>
        </div>
    </footer>
</div>
@endsection