<?php

use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(App\PrayerRequest::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'description' => $faker->realText(200),
        'request_type' => Arr::random(['community', 'mass']),
        'publish_at' => now()->toDateTimeString()
    ];
});
