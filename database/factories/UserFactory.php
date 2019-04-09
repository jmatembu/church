<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'priest', [
    'category' => 'Priest',
    'prefix' => 'Rev. Fr.'
]);

$factory->state(App\User::class, 'bishop', [
    'category' => 'Bishop',
    'prefix' => 'Bp'
]);

$factory->state(App\User::class, 'laity', [
    'category' => 'Laity',
]);

$factory->afterCreatingState(App\User::class, 'bishop', function ($user, $faker) {
    $user->clergy()->save(factory(App\Clergy::class)->state('bishop')->make());
    factory(App\Diocese::class)->create([
        'clergy_id' => $user->id
    ]);
});

$factory->afterCreatingState(App\User::class, 'laity', function ($user) {
    $user->prayerRequests()->save(factory(App\PrayerRequest::class)->make([
        'parish_id' => $user->current_parish
    ]));
});
