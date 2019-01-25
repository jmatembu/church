<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $body = '';
    // Create a large body of text
	for ($i=0; $i < 5; $i++) {
		$body = $body . '<p>' . $faker->realText(500, 4) . '</p>';
    }
    
    return [
        'title' => $faker->sentence(),
        'body' => $body,
        'media' => [
            'image' => $faker->imageUrl()
        ]
    ];
});

$factory->state(App\Post::class, 'homily', [
        'media' => [
            'audio' => 'http://www.lukeduncan.me/oslo.mp3',
            'video' => '',
            'pdf' => '',
        ]
]);
