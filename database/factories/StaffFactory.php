<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    $parishes = App\Parish::pluck('id')->all();
    $laity = App\User::whereCategory('laity')->pluck('id')->all();
    $roles = ['Catechist', 'Secretary', 'Administrator'];

    return [
        'role' => array_random($roles, 1)[0],
        'user_id' => array_random($laity, 1)[0],
        'parish_id' => array_random($parishes, 1)[0]
    ];
});

$factory->state(App\Staff::class, 'administrator', [
    'role' => 'Administrator',
]);
