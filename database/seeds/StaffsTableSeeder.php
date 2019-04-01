<?php

use App\Staff;
use App\User;
use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parishes = App\Parish::all();

        $parishes->each(function ($parish) {
            $user = factory(User::class)->create([
                'current_parish' => $parish->id
            ]);
            $user->staff()->save(factory(Staff::class)->states(['administrator'])->make([
                'parish_id' => $parish->id
            ]));
        });
    }
}
