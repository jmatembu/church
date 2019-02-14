<?php

use Faker\Generator as Faker;

$factory->define(App\Diocese::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(200)
    ];
});

$factory->afterCreating(App\Diocese::class, function ($diocese, $faker) {
    $parishes = $diocese->parishes()->saveMany(factory(App\Parish::class, 5)->make());

    $parishes->each(function ($parish) {
        // Create parish sub parishes
        $parish->subParishes()->saveMany(factory(App\SubParish::class, 5)->make());
        // Create parish events
        $parish->events()->saveMany(factory(App\Event::class, 5)->make());
        // Create parish projects
        $parish->projects()->saveMany(factory(App\Project::class, 3)->make());
        // Create parish categories
        $categories = $parish->categories()->saveMany(factory(App\Category::class, 3)->make());

        $categories->each(function ($category) use ($parish) {
            // Create category posts
            $parish->posts()->saveMany(factory(App\Post::class, 10)->make(['category_id' => $category->id]));
        });

        $homilyCategory = $parish->categories()->save(factory(App\Category::class)->make(['name' => 'Homilies']));
        $homilies = $parish->posts()->saveMany(factory(App\Post::class, 5)->state('homily')->make(['category_id' => $homilyCategory->id]));
    });
});
