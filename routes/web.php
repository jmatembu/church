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

Route::view('/', 'welcome')->name('home');
Auth::routes(['verify' => true]);

// Site pages
Route::view('terms-of-service', 'terms')->name('pages.terms');
Route::get('parishes', 'Parish\ParishController@index')->name('parishes.index');
Route::post('feedback', 'ReceiveFeedback')->name('feedback.store');


Route::middleware(['auth'])->group(function () {
    Route::get('home', 'ParishController@index')->name('parish.index')->middleware('parish');
    Route::get('users/account', 'AccountController@index')->name('users.account');
    Route::get('users/settings', 'Account\SettingController@index')->name('users.settings.index');
    Route::put('users/settings', 'Account\SettingController@update')->name('users.settings.update');
    Route::get('users/prayer-requests', 'Account\PrayerRequestController@index')->name('users.prayerRequests.index');
    Route::get('users/prayer-requests/create', 'Account\PrayerRequestController@create')->name('users.prayerRequests.create');
    Route::post('users/prayer-requests', 'Account\PrayerRequestController@store')->name('users.prayerRequests.store');
    Route::get('users/prayer-requests/{prayerRequest}/edit', 'Account\PrayerRequestController@edit')->name('users.prayerRequests.edit');
    Route::put('users/prayer-requests/{prayerRequest}', 'Account\PrayerRequestController@update')->name('users.prayerRequests.update');
    Route::delete('users/prayer-requests/{prayerRequest}', 'Account\PrayerRequestController@destroy')->name('users.prayerRequests.destroy');
});


Route::name('parish.')->middleware([])->prefix('parish/{parish}')->group(function () {
    Route::get('/', [\App\Http\Controllers\Parish\PageController::class, 'parish'])->name('show');
    Route::get('/about-the-parish', 'Parish\PageController@about')->name('about');
    Route::get('news', 'PostController@index')->name('news.index');
    Route::get('news/{post}', 'PostController@show')->name('news.show');
    Route::get('projects', 'ProjectController@index')->name('projects.index');
    Route::get('projects/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('events', 'EventController@index')->name('events.index');
    Route::get('events/{event}', 'EventController@show')->name('events.show');

    Route::view('/contact-us', 'parish.contact')->name('contact.create');
    Route::post('/contact-us', 'Parish\ContactParish')->name('contact.send');
    Route::get('/prayer-requests', 'Parish\PrayerRequestController@index')->name('prayerRequests.index');

    Route::name('admin.')
            ->prefix('admin')
            ->namespace('Parish\Admin')
            ->middleware(['isParishAdmin'])
            ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/settings', 'SettingController@index')->name('settings.index');
        Route::put('/settings/contacts', 'SettingController@contacts')->name('settings.contacts');
        Route::put('/settings/mass-schedule', 'SettingController@massSchedule')->name('settings.massSchedule');
        Route::put('/settings/banner', 'SettingController@banner')->name('settings.banner');
        Route::put('/settings/quotes/update', 'SettingController@updateQuote')->name('settings.quotes.update');
        Route::put('/settings/parish-update', 'SettingController@parishUpdate')->name('settings.parishUpdate');
        Route::resource('/news', 'NewsController');
        Route::resource('/pages', 'PageController');
        Route::resource('/projects', 'ProjectController');
        Route::resource('/events', 'EventController');
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    \Aschmelyun\Larametrics\Larametrics::routes();
});


