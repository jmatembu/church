<?php

namespace Tests\Feature\Parish\Admin;

use App\Parish;
use App\Staff;
use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class PageTest extends TestCase
{
    protected $user;
    protected $admin;
    protected $staff;
    protected $parish;

    public function setUp(): void
    {
        parent::setUp();

        $this->setupParish();
    }

    protected function setupParish()
    {
        $this->parish = factory(Parish::class)->create();
        $this->user = factory(User::class)->create();
        $this->admin = factory(User::class)->create(['current_parish' => $this->parish->id]);
        $this->staff = $this->parish->staffs()->save(factory(Staff::class)
            ->states('administrator')
            ->make([
                'user_id' => $this->admin->id
            ]));
    }

    public function testNonAdminDoesNotHaveAccess()
    {
        $response = $this->actingAs($this->user)->get(route('parish.admin.dashboard', $this->parish));

        $response->assertForbidden();
    }

    public function testAdministratorCanAccessAdminArea()
    {
        $response = $this->actingAs($this->admin)
                         ->get(route('parish.admin.dashboard', $this->parish));

        $response->assertOk();
        $response->assertSeeText('Parish Dashboard');
    }
}
