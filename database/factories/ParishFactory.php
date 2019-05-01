<?php

use App\Category;
use App\Post;
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

    if (! $parish->pageCategory) {
        $parish->categories()->save(factory(App\Category::class)->make([
            'name' => 'Pages'
        ]));
    }

    $parish->refresh()->posts()->save(factory(App\Post::class)->make(['title' => 'About the Parish', 'category_id' => $parish->pageCategory->id]));
});
