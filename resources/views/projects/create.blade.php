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
                            </div>                                                                            {{-- function old displays old data when form is failing validation --}}
                        </div>
                        <div class="field">
                            <label for="descriptipon" class="label">Description</label>
                            <div class="control">
                                <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required></textarea>
                            </div>
                        </div>
                        @include('errors')
                    
            </div>
        </div>
        <footer class="card-footer">
            <div class="card-footer-item">
                <button type="submit" class="button is-medium some-space is-success">Save</button>
                <a href="/home" class="button is-medium some-space is-info">Cancel</a>
            </div>
        </footer>
    </form>
    </div>
@endsection