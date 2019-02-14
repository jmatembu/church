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

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'ParishController@index')->name('parish.index')->middleware('parish');
    Route::get('users/account', 'AccountController@index')->name('users.account');
    Route::get('users/settings', 'UserSettingController@index')->name('users.settings.index');
    Route::put('users/settings', 'UserSettingController@update')->name('users.settings.update');
});


Route::name('parish.')->prefix('parish')->group(function () {
    Route::get('/{parish}/news', 'PostController@index')->name('news.index');
    Route::get('/{parish}/news/{post}', 'PostController@show')->name('news.show');
    Route::get('/{parish}/projects', 'ProjectController@index')->name('projects.index');
    Route::get('/{parish}/projects/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('/{parish}/events', 'EventController@index')->name('events.index');
    Route::get('/{parish}/events/{event}', 'EventController@show')->name('events.show');
    Route::view('/{parish}/contact-us', 'parish.contact')->name('contact.create');
});