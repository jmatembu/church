<?php

namespace Tests\Feature\Account;

use App\Parish;
use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrayerRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutExceptionHandling();
    }

    public function testUserWithParishCanAddPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);

        $response = $this->actingAs($user)->get('/users/prayer-requests');

        $response->assertOk();
        $response->assertSee('Add Prayer Request');
    }

    public function testParishionerCanViewPageToAddPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);

        $response = $this->actingAs($user)->get('/users/prayer-requests/create');

        $response->assertOk();
    }

    public function testNonParishionerCannotAddPrayerRequest()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/users/prayer-requests', [
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
        ]);

        $response->assertRedirect('/users/account');
    }

    public function testParishionerCanAddPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $prayerRequestTitle = 'Test prayer request title';

        $response = $this->actingAs($user)->post('/users/prayer-requests', [
            'title' => $prayerRequestTitle,
            'description' => 'Test prayer request description',
        ]);
        $prayerRequest = $user->refresh()->prayerRequests->first();

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('users.prayerRequests.index'));
        $this->assertTrue($prayerRequest->title === $prayerRequestTitle);
    }

    public function testParishionerViewPageToEditPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $prayerRequestTitle = 'Test prayer request title';
        $prayerRequest = $user->prayerRequests()->create([
            'title' => $prayerRequestTitle,
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);

        $response = $this->actingAs($user)->get('users/prayer-requests/' . $prayerRequest->id . '/edit');

        $response->assertOk();
    }

    public function testParishionerCanUpdateOwnPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);
        $prayerRequest = $user->prayerRequests()->create([
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);

        $response = $this->actingAs($user)->put('users/prayer-requests/' . $prayerRequest->id, [
            'title' => 'Test title updated'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('users.prayerRequests.index'));
        $this->assertEquals('Test title updated', $prayerRequest->refresh()->title);
    }

    public function testParishionerCannotUpdateAnotherPrayerRequest()
    {
        $parish = Parish::all()->random();
        $userA = factory(User::class)->create(['current_parish' => $parish->id]);
        $userB = factory(User::class)->create(['current_parish' => $parish->id]);
        $prayerRequestA = $userA->prayerRequests()->create([
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);
        $prayerRequestB = $userB->prayerRequests()->create([
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);

        $response = $this->actingAs($userA)->put(route('users.prayerRequests.update', $prayerRequestB), [
            'title' => 'Test title updated'
        ]);

        $response->assertSessionHas('error');
        $response->assertRedirect(route('users.prayerRequests.index'));
        $this->assertEquals('Test prayer request title', $prayerRequestB->refresh()->title);
    }

    public function testParishionerCanDeleteOwnPrayerRequest()
    {
        $parish = Parish::all()->random();
        $user = factory(User::class)->create(['current_parish' => $parish->id]);

        $prayerRequest = $user->prayerRequests()->create([
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);

        $response = $this->actingAs($user)->delete(route('users.prayerRequests.destroy', $prayerRequest));

        $response->assertRedirect(route('users.prayerRequests.index'));
        $response->assertSessionHas('success');
        $this->assertCount(0, $user->prayerRequests);
    }

    public function testParishionerCannotDeleteAnotherPrayerRequest()
    {
        $parish = Parish::all()->random();
        $userA = factory(User::class)->create(['current_parish' => $parish->id]);
        $userB = factory(User::class)->create(['current_parish' => $parish->id]);
        $prayerRequestB = $userB->prayerRequests()->create([
            'title' => 'Test prayer request title',
            'description' => 'Test prayer request description',
            'parish_id' => $parish->id
        ]);

        $response = $this->actingAs($userA)->delete(route('users.prayerRequests.destroy', $prayerRequestB));

        $response->assertSessionHas('error');
        $response->assertRedirect(route('users.prayerRequests.index'));
        $this->assertCount(1, $userB->prayerRequests);
    }
}