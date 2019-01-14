@extends('layouts.app')

@section('content')
<div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Create New Project
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                    <form method="POST" action="/projects">
                        {{ csrf_field() }}
                        <div class="field">
                            <label for="title" class="label">Title</label>
                            <div class="control">
                            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ old('title')}}" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="descriptipon" class="label">Description</label>
                            <div class="control">
                                <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link">Save Project</button>
                            </div>
                        </div>
                        @include('errors')
                    </form>
            </div>
        </div>
        {{-- <footer class="card-footer">
            <a href="#" class="card-footer-item has-success-text">Save Project</a>
        </footer> --}}
    </div>
@endsection