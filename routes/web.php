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

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'ParishController@index')->name('parish.index')->middleware('parish');
Route::get('/users/account', 'AccountController@index')->name('users.account');

Route::name('parish.')->prefix('parish')->group(function () {
    Route::get('/{parish}/projects', 'ProjectController@index')->name('projects.index');
    Route::get('/{parish}/projects/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('/{parish}/events', 'EventController@index')->name('events.index');
    Route::get('/{parish}/events/{event}', 'EventController@show')->name('events.show');
});