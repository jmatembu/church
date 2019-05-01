<?php

namespace Tests\Feature\Parish\Admin;

use App\Parish;
use App\Staff;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagePostTest extends TestCase
{
    public function testPagesIsAccessible()
    {
        $parish = factory(Parish::class)->create();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $parish->staffs()->save(factory(Staff::class)
            ->states('administrator')
            ->make([
                'user_id' => $user->id
            ]));

        $response = $this->actingAs($user)->get(route('parish.admin.pages.index', $parish));

        $response->assertOk();
        $response->assertSeeText('Pages');
    }

    public function testParishHasAboutPage()
    {
        $parish = factory(Parish::class)->create();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $parish->staffs()->save(factory(Staff::class)
            ->states('administrator')
            ->make([
                'user_id' => $user->id
            ]));

        $response = $this->actingAs($user)->get(route('parish.admin.pages.index', $parish));

        $response->assertOk();
        $response->assertSeeText('About the Parish');
        $this->assertEquals($parish->aboutPage->title, 'About the Parish');
    }
}
