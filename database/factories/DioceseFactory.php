<?php

use App\Category;
use App\Clergy;
use App\Staff;
use App\User;
use \Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(App\Diocese::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(200),
        'country' => 'Uganda',
    ];
});

$factory->afterCreating(App\Diocese::class, function ($diocese, $faker) {
    $parishes = $diocese->parishes()->saveMany(factory(App\Parish::class, 2)->make());

    $parishes->each(function ($parish) {
        // Create parish sub parishes
        $parish->subParishes()->saveMany(factory(App\SubParish::class, 3)->make());
        // Create parish events
        $parish->events()->saveMany(factory(App\Event::class, 5)->make());
        // Create parish projects
        $parish->projects()->saveMany(factory(App\Project::class, 3)->make());

        // Create parish categories
        $categoryNames = collect(['News', 'Pages']);
        $categoryNames->each(function ($categoryName) use ($parish) {
            $parish->categories()->save(factory(App\Category::class)->make([
                'name' => $categoryName
            ]));
        });

        $parish->categories->each(function ($category) use ($parish) {
            // Create category posts
            if ($category->name != 'Pages') {
                $parish->posts()->saveMany(factory(App\Post::class, 5)->make(['category_id' => $category->id]));
            }
        });

        // Create homilies
        $homilyCategory = $parish->categories()->save(factory(App\Category::class)->make(['name' => 'Homilies']));
        $parish->posts()->saveMany(factory(App\Post::class, 5)->state('homily')->make(['category_id' => $homilyCategory->id]));

        // Create an about page
        $parish->posts()->save(factory(App\Post::class)->make(['title' => 'About the Parish', 'category_id' => $parish->pageCategory->id]));
    });
});
