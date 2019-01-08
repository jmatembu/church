<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->state('bishop')->create([
                'prefix' => 'Bp'
            ]);

        factory(App\User::class, 50)->state('priest')->create([
                'prefix' => 'Rev. Fr.'
            ])->each(function ($priest) {
                $priest->clergy()->save(factory(App\Clergy::class)->state('priest')->make());
            });
        // Create some staff from laity
        factory(App\User::class, 10)->create()->each(function ($user) {
                $parishes = App\Parish::pluck('id')->all();

                $staff = factory(App\Staff::class)->make(['parish_id' => array_random($parishes, 1)[0]]);

                $user->staff()->save($staff);
            });

        // Rest of the laity
        factory(App\User::class, 100)->create();
    }
}
