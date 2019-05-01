<?php

namespace Tests\Feature\Account;

use App\Parish;
use App\User;
use Tests\TestCase;

class PageTest extends TestCase
{
    public function testDashboardIsAccessible()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('users/account');

        $response->assertOk();
    }

    public function testPrayerRequestsPageIsAccessible()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.prayerRequests.index'));

        $response->assertOk();
        $response->assertSeeText('Prayer Requests');

    }

    public function testSettingsPageAccessible()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.settings.index'));

        $response->assertOk();
        $response->assertSeeText('Settings');
    }

    public function testParishionerCanSeeParishHomeLink()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);

        $response = $this->actingAs($user)->get(route('users.account'));

        $response->assertOk();
        $response->assertSeeText('Parish Home');
    }

    public function testNonParishionerCannotSeeParishHomeLink()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('users.account'));

        $response->assertOk();
        $response->assertDontSeeText('Parish Home');
    }
}
