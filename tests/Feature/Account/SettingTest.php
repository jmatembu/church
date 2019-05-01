<?php

namespace Tests\Feature\Account;

use App\Parish;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingTest extends TestCase
{
    public function testUserCanSetDefaultParish()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->put(route('users.settings.update'), ['default_parish' => $parish->id]);

        $response->assertRedirect(route('users.settings.index'));
        $response->assertSessionHas('success');
        $this->assertEquals($parish->id, $user->refresh()->current_parish);
    }
}
