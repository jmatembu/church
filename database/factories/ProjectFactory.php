<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $body = '';
    // Create a large body of text
    for ($i=0; $i < 2; $i++) {
        $body = $body . '<p>' . $faker->realText(300, 4) . '</p>';
    }
    return [
        'title' => $faker->realText(10),
        'description' => $body,
        'budget' => $faker->randomFloat(0, 300, 100000),
        'featured_image' => $faker->imageUrl()
    ];
});
