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
            {{-- <ul> --}}
            @if ($projects->count() > 0)
                <div class="tile is-ancestor">
                    @foreach ($projects as $project)
                        <div class="tile is-parent is-4">
                                <article class="tile is-child card has-background-white-ter">
                                    <header class="card-header">
                                        <p class="card-header-title has-text-white-ter has-background-info">
                                            {{ $project->title }}
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            {{ $project->description }}
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <a class="button is-info card-footer-item has-text-white" href="/projects/{{$project->id}}">Details</a>
                                    </footer>
                                </article>
                        </div>
                    @endforeach
                </div>
            @else
                Looks like you haven't created any projects yet. To start click on Create New Project button below.
            @endif
            {{-- </ul> --}}
        </div>
    </div>
    <footer class="card-footer">
        <div class="card-footer-item">
            <a href="/projects/create" class="button is-medium some-space is-success">Create New Project</a>
        </div>
    </footer>
</div>
@endsection
