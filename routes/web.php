<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ProjectsController@index');

Route::resource('projects', 'ProjectsController');

//Creating Tasks
//Route::post('/projects/{project}/tasks/{task}', 'ProjectTasksController@store');
Route::delete('/task/{task}', 'ProjectTasksController@destroy');

//flipping tasks completed / not completed
Route::patch('/projects/tasks/{task}','ProjectTasksController@update');

