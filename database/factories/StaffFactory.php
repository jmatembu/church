<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    $parishes = App\Parish::pluck('id')->all();
    $laity = App\User::whereCategory('laity')->pluck('id')->all();
    $roles = ['Catechist', 'Secretary', 'Administrator'];

    return [
        'role' => array_random($roles),
        'user_id' => array_random($laity),
        'parish_id' => array_random($parishes)
    ];
});

$factory->state(App\Staff::class, 'administrator', [
    'role' => 'Administrator',
]);
