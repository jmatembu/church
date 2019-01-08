<?php

use Faker\Generator as Faker;

$factory->define(App\Parish::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence
    ];
});

$factory->afterCreating(App\Parish::class, function ($parish, $faker) {
    $parish->subParishes()->saveMany(factory(App\SubParish::class, 5)->make());
});
