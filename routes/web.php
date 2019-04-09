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
    Route::get('users/prayer-requests', 'Account\PrayerRequestController@index')->name('users.prayerRequests.index');
    Route::get('users/prayer-requests/create', 'Account\PrayerRequestController@create')->name('users.prayerRequests.create');
    Route::post('users/prayer-requests', 'Account\PrayerRequestController@store')->name('users.prayerRequests.store');
});


Route::name('parish.')->middleware(['auth', 'parish'])->prefix('parish/{parish}')->group(function () {
    Route::get('/about-the-parish', 'Parish\PageController@about')->name('about');
    Route::get('news', 'PostController@index')->name('news.index');
    Route::get('news/{post}', 'PostController@show')->name('news.show');
    Route::get('projects', 'ProjectController@index')->name('projects.index');
    Route::get('projects/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('events', 'EventController@index')->name('events.index');
    Route::get('events/{event}', 'EventController@show')->name('events.show');

    Route::view('/contact-us', 'parish.contact')->name('contact.create');
    Route::get('/prayer-requests', 'Parish\PrayerRequestController@index')->name('prayerRequests.index');

    Route::name('admin.')
            ->prefix('admin')
            ->namespace('Parish\Admin')
            ->middleware(['isParishAdmin'])
            ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/settings', 'SettingController@index')->name('settings.index');
        Route::put('/settings/contacts', 'SettingController@contacts')->name('settings.contacts');
        Route::put('/settings/banner', 'SettingController@banner')->name('settings.banner');
        Route::put('/settings/parish-update', 'SettingController@parishUpdate')->name('settings.parishUpdate');
        Route::resource('/news', 'NewsController');
        Route::resource('/pages', 'PageController');
        Route::resource('/projects', 'ProjectController');
    });
});


