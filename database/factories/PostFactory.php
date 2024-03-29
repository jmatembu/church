<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $body = '';
    // Create a large body of text
	for ($i=0; $i < 5; $i++) {
		$body = $body . '<p>' . $faker->realText(500, 4) . '</p>';
    }

    return [
        'title' => $faker->realText(100),
        'body' => $body,
    ];
});

$factory->state(App\Post::class, 'homily', [

]);
