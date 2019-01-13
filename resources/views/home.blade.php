@extends('layouts.app')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            Dashboard
        </p>
        @if (session('status'))
            <p class="title is-6 has-text-success">
                    {{ session('status') }}
            </p>
        @endif
    </header>
    <div class="card-content">
        <div class="content">
            Looks like you haven't created any projects yet. To start click on Create New Project button below.
        </div>
    </div>
    <footer class="card-footer">
        <a href="#" class="card-footer-item is-primary">Create New Project</a>
    </footer>
</div>
@endsection
