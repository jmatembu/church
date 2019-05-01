<?php

namespace Tests\Feature\Parish\Admin;

use App\Parish;
use App\Staff;
use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class PageTest extends TestCase
{
    public function testNonAdminDoesNotHaveAccess()
    {
        $parish = factory(Parish::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('parish.admin.dashboard', $parish));

        $response->assertForbidden();
    }

    public function testAdministratorCanAccessAdminArea()
    {
        $parish = factory(Parish::class)->create();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $parish->staffs()->save(factory(Staff::class)
            ->states('administrator')
            ->make([
                'user_id' => $user->id
            ]));

        $response = $this->actingAs($user)
                         ->get(route('parish.admin.dashboard', $parish));

        $response->assertOk();
        $response->assertSeeText('Parish Dashboard');
    }
}
