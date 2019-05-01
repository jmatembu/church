<?php

namespace Tests\Feature;

use App\Parish;
use App\Staff;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Tests\TestCase;

class ParishPageTest extends TestCase
{
    protected $user;
    protected $parish;
    protected $parishioner;

    public function setUp(): void
    {
        parent::setUp();

        $this->setupParish();
    }

    protected function setupParish()
    {
        $this->parish = Parish::all()->random();
        $this->user = factory(User::class)->create();
        $this->parishioner = factory(User::class)->create([
            'current_parish' => $this->parish->id
        ]);
    }

    public function testGuestUserIsRedirectedToSiteHome()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/');
    }

    public function testAuthenticatedUserIsRedirectedToParishPage()
    {
        $response = $this->actingAs($this->parishioner)->get('/home');

        $response->assertOk();
    }

    public function testAuthenticatedUserWithoutParishIsRedirectedToAccount()
    {
        $response = $this->actingAs($this->user)->get('/home');
        $response->assertRedirect('/users/account');
    }

    public function testParishNewsPageIsAccessible()
    {
        $response = $this->get('parish/' . $this->parish->slug . '/news');

        $response->assertOk();
    }

    public function testUserCanViewNewsDetails()
    {
        $post = $this->parish->news->first();

        $response = $this->get('parish/' . $this->parish->slug . '/news/' . $post->slug);

        $response->assertOk();
    }

    public function testParishEventsPageIsAccessible()
    {
        $response = $this->get('parish/' . $this->parish->slug . '/events');

        $response->assertOk();
    }

    public function testUserCanViewEventDetails()
    {
        $event = $this->parish->events->first();

        $response = $this->get(route('parish.events.show', [
            'parish' => $this->parish,
            'event' => $event
        ]));

        $response->assertOk();
    }

    public function testParishProjectsPageIsAccessible()
    {
        $response = $this->get(route('parish.projects.index', $this->parish));

        $response->assertOk();
    }

    public function testUserCanViewProjectDetails()
    {
        $project = $this->parish->projects->first();

        $response = $this->get(route('parish.projects.show', [
            'parish' => $this->parish,
            'project' => $project
        ]));

        $response->assertOk();
    }

    public function testParishPrayerRequestsPageIsAccessible()
    {
        $response = $this->get(route('parish.prayerRequests.index', $this->parish));

        $response->assertOk();
    }

    public function testAboutParishPageIsAccessible()
    {
        $response = $this->get(route('parish.about', $this->parish));

        $response->assertOk();
    }

    public function testParishContactPageIsAccessible()
    {
        $response = $this->get(route('parish.contact.create', $this->parish));

        $response->assertOk();
    }


}
