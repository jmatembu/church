<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SitePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsAccessible()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testFindParishPageIsAccessible()
    {
        $response = $this->get('parishes');

        $response->assertOk();
    }

    public function testLoginPageIsAccessible()
    {
        $response = $this->get('login');

        $response->assertOk();
    }

    public function testRegisterPageIsAccessible()
    {
        $response = $this->get('register');

        $response->assertOk();
    }
}
