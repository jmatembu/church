<?php

namespace Tests\Browser;

use App\Parish;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginPageIsAccessible()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->assertSee('Login to your Account');
        });
    }

    public function testUserWithoutParishIsRedirectedToAccountPage()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.org'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertRouteIs('users.account');

            $browser->quit();
        });
    }

    public function testUserWithParishSeesTheirParishPage()
    {
        factory(User::class)->state('bishop')->create();
        $parish = Parish::get()->random();
        $user = factory(User::class)->create([
            'email' => 'test@example.org',
            'current_parish' => $parish->id
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }
}
