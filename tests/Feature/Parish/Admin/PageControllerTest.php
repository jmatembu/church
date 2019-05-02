<?php

namespace Tests\Feature\Parish\Admin;

use App\Parish;
use App\Staff;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageControllerTest extends TestCase
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

    public function testIndexPageIsAccessible()
    {
        $response = $this->actingAs($this->admin)->get(route('parish.admin.pages.index', $this->parish));

        $response->assertOk();
        $response->assertSeeText('Pages');
    }

    public function testCanViewPageDetails()
    {
        $response = $this->actingAs($this->admin)->get(route('parish.admin.pages.show', ['parish' => $this->parish, 'page' => $this->parish->pages->first()]));

        $response->assertOk()
                ->assertViewIs('parish.admin.pages.show')
                ->assertSeeText('Edit')
                ->assertSeeText('Back');

    }


}
