<?php

namespace Tests\Feature\Account;

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

        $response = $this->actingAs($user)->get('users/prayer-requests');

        $response->assertOk();
    }

    public function testSettingsPageAccessible()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('users/settings');

        $response->assertOk();
    }
}
