<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(10),
        'description' => $faker->realText(),
        'budget' => $faker->randomFloat(0, 300, 100000)
    ];
});
