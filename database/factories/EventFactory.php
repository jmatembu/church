<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30),
        'description' => $faker->realText(),
        'venue' => $faker->words(2, true),
        'starts_at' => now()->addDays(3)->toDateTimeString(),
        'ends_at' => now()->addDays(20)->toDateTimeString(),
    ];
});
