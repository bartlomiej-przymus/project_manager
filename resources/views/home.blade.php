@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Dashboard
        </p>
    </header>
    <div class="card-content">
        <div class="content">
            <ul>
            @if ($projects->count() > 0)
                @foreach ($projects as $project)
                    <li>
                        <h4><a href="/projects/{{$project->id}}" class="link">
                            {{ $project->title }}
                        </a></h4>
                    </li>
                @endforeach
            @else
                Looks like you haven't created any projects yet. To start click on Create New Project button below.
            @endif
            </ul>
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <a href="/projects/create" class="button is-medium some-space is-success">Create New Project</a>
        </div>
    </footer>
</div>
@endsection
