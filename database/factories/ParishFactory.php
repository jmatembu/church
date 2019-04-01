<?php

use Faker\Generator as Faker;

$factory->define(App\Parish::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(200),
        'settings' => [
            'contacts' => [
                'address' => $faker->address,
                'email' => $faker->safeEmail,
                'phone' => [
                    $faker->e164PhoneNumber,
                    $faker->e164PhoneNumber
                ]
            ]
        ]
    ];
});

$factory->afterCreating(App\Parish::class, function ($parish, $faker) {
    $parish->subParishes()->saveMany(factory(App\SubParish::class, 5)->make());
});
