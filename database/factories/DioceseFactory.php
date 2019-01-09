<?php

use Faker\Generator as Faker;

$factory->define(App\Diocese::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence
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
            $parish->posts()->saveMany(factory(App\Post::class, 20)->make(['category_id' => $category->id]));
        });

        $sermonCategory = $parish->categories()->save(factory(App\Category::class)->make(['name' => 'Sermons']));
        $sermons = $parish->posts()->saveMany(factory(App\Post::class, 5)->state('sermon')->make(['category_id' => $sermonCategory->id]));
    });
});
