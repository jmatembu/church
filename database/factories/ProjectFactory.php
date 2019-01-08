<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->words(4, true),
        'description' => $faker->realText(),
        'budget' => $faker->randomFloat(0, 300, 100000)
    ];
});
