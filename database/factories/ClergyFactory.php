<?php

use Faker\Generator as Faker;

$factory->define(App\Clergy::class, function (Faker $faker) {
    $categories = ['Cardinal', 'Bishop', 'Priest', 'Deacon'];

    return [
        'category' => array_random($categories, 1)
    ];
});

$factory->state(App\Clergy::class, 'priest', [
    'category' => 'Priest',
]);

$factory->state(App\Clergy::class, 'bishop', [
    'category' => 'Bishop',
]);
