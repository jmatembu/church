<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParishPageTest extends TestCase
{
    public function testGuestUserIsRedirectedToSiteHome()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/');
    }
}
