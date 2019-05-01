<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Tests\TestCase;

class ParishPageTest extends TestCase
{
    public function testGuestUserIsRedirectedToSiteHome()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/');
    }

    public function testAuthenticatedUserIsRedirectedToParishPage()
    {
        $parish = \App\Parish::all()->random();
        $user = factory(\App\User::class)->create(['current_parish' => $parish->id]);

        $response = $this->actingAs($user)->get('/home');
        $response->assertOk();
    }

    public function testAuthenticatedUserWithoutParishIsRedirectedToAccount()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertRedirect('/users/account');
    }

    public function testParishNewsPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/news');

        $response->assertOk();
    }

    public function testUserCanViewNewsDetails()
    {
        $parish = \App\Parish::all()->random();
        $post = $parish->news->first();

        $response = $this->get('parish/' . $parish->slug . '/news/' . $post->slug);

        $response->assertOk();
    }

    public function testParishEventsPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/events');

        $response->assertOk();
    }

    public function testUserCanViewEventDetails()
    {
        $parish = \App\Parish::all()->random();
        $event = $parish->events->first();

        $response = $this->get('parish/' . $parish->slug . '/events/' . $event->slug);

        $response->assertOk();
    }

    public function testParishProjectsPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/projects');

        $response->assertOk();
    }

    public function testUserCanViewProjectDetails()
    {
        $parish = \App\Parish::all()->random();
        $project = $parish->projects->first();

        $response = $this->get('parish/' . $parish->slug . '/projects/' . $project->slug);

        $response->assertOk();
    }

    public function testParishPrayerRequestsPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/prayer-requests');

        $response->assertOk();
    }

    public function testAboutParishPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/about-the-parish');

        $response->assertOk();
    }

    public function testParishContactPageIsAccessible()
    {
        $parish = \App\Parish::all()->random();

        $response = $this->get('parish/' . $parish->slug . '/contact-us');

        $response->assertOk();
    }


}
