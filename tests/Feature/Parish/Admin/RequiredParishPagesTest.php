<?php

namespace Tests\Feature\Parish\Admin;

use App\Parish;
use App\Staff;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequiredParishPagesTest extends TestCase
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

    public function testParishHasAboutPage()
    {

        $response = $this->actingAs($this->admin)->get(route('parish.admin.pages.index', $this->parish));

        $response->assertOk();
        $response->assertSeeText('About the Parish');
        $this->assertEquals($this->parish->aboutPage->title, 'About the Parish');
    }

    public function testEditPageIsAccessible()
    {
        $response = $this->actingAs($this->admin)->get(route('parish.admin.pages.edit', ['parish' => $this->parish, 'page' => $this->parish->pages->first()]));

        $response->assertOk();
        $response->assertViewIs('parish.admin.pages.edit');
    }

    public function testAdministratorCanUpdateAboutPage()
    {
        $aboutPage = $this->parish->about_page;
        $response = $this->actingAs($this->admin)->put(route('parish.admin.pages.update', [
            'parish' => $this->parish,
            'page' => $aboutPage
        ]), [
            'body' => '<p>Lorem ipsum dolor sit amet</p>'
        ]);

        $response->assertRedirect(route('parish.admin.pages.show', [
            'parish' => $this->parish,
            'page' => $aboutPage
        ]));
        $this->assertEquals($aboutPage->refresh()->body, '<p>Lorem ipsum dolor sit amet</p>');
    }

    public function testAdministratorCannotDeleteAboutPage()
    {
        $aboutPage = $this->parish->about_page;
        $response = $this->actingAs($this->admin)->delete(route('parish.admin.pages.destroy', [
            'parish' => $this->parish,
            'page' => $aboutPage
        ]));

        $response->assertRedirect();
        $response->assertSessionHas('error', 'You do not have permissions to delete this page.');
    }
}
