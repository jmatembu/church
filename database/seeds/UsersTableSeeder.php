<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->state('bishop')->create();

        factory(App\User::class, 10)->state('priest')->create()->each(function ($priest) {
            $priest->clergy()->save(factory(App\Clergy::class)->state('priest')->make());
        });

        // Rest of the laity
        factory(App\User::class, 100)->state('laity')->create([
            'current_parish' => Arr::random(App\Parish::pluck('id')->all()),
        ]);
        // Known users
        $joseph = factory(App\User::class)->create([
            'email' => 'jmatembu@gmail.com',
            'current_parish' => App\Parish::get()->random()->id
        ]);
        // Make joseph an Administrator of his parish
        factory(\App\Staff::class)->states('administrator')->create([
            'user_id' => $joseph->id,
            'parish_id' => $joseph->current_parish
        ]);
    }
}
