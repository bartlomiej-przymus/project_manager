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
                    <div class="control">
                        <label for="title" class="label">Title</label>
                            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ old('title')}}" required>
                    </div>                                                                            {{-- function old displays old data when form is failing validation --}}
                </div>
                <div class="field">
                    <div class="control">
                        <label for="descriptipon" class="label">Description</label>
                            <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required></textarea>
                    </div>
                </div>
            @include('errors')
        </div>
        <h6 class="is-small has-text-grey">Project Settings</h6>
        <div class="content box">
            <div class="field is-horizontal">
                <nav class="level">
                    <div class="level-left">
                        <div class="control">
                            <label class="switch">
                                <input name="settings[]" id="tasks" type="checkbox" value="tasks" checked>
                                <span class="slider round"></span>
                            </label>
                            - Enable Tasks
                        </div>
                    </div>
                    <div class="level-left">
                        <div class="control">
                            <label class="switch">
                                <input name="settings[]" id="budget" type="checkbox" value="budget" checked>
                                <span class="slider round"></span>
                            </label>
                            - Enable Budget
                        </div>
                    </div>
                    <div class="level-left">
                        <div class="control">
                            <label class="switch">
                                <input name="settings[]" id="scheduler" type="checkbox" value="scheduler" checked>
                                <span class="slider round"></span>
                            </label>
                            - Enable Scheduler
                        </div>
                    </div>
                    <div class="level-item">
                        <div class="control">
                            <label class="switch">
                                <input name="settings[]" id="notifications" type="checkbox" value="notifications" checked>
                                <span class="slider round"></span>
                            </label>
                            - Enable Notifications:
                        </div>
                    </div>
                </nav>
            </div>
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