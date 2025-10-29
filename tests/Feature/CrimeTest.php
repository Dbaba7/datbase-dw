<?php

namespace Tests\Feature;

use App\Models\Crime;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CrimeTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }

    public function test_a_user_can_view_the_crime_index_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('crimes.index'));

        $response->assertStatus(200);
    }

    public function test_a_user_can_create_a_crime()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $crimeData = [
            'crime_type' => 'Robbery',
            'description' => 'A bank was robbed.',
            'location' => '123 Main St',
        ];

        $response = $this->post(route('crimes.store'), $crimeData);

        $response->assertRedirect(route('crimes.index'));
        $this->assertDatabaseHas('crimes', $crimeData);
    }

    public function test_a_user_can_view_a_crime()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $crime = Crime::factory()->create();

        $response = $this->get(route('crimes.show', $crime));

        $response->assertStatus(200);
    }

    public function test_a_user_can_update_a_crime()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $crime = Crime::factory()->create();

        $updatedData = [
            'crime_type' => 'Burglary',
            'description' => 'A house was burglarized.',
            'location' => 'los angeles',
            'status' => 'resolved',
        ];

        $response = $this->patch(route('crimes.update', $crime), $updatedData);

        $response->assertRedirect(route('crimes.show', $crime));
        $this->assertDatabaseHas('crimes', $updatedData);
    }

    public function test_a_user_can_delete_a_crime()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $crime = Crime::factory()->create();

        $this->assertDatabaseHas('crimes', ['id' => $crime->id]);

        $response = $this->delete(route('crimes.destroy', $crime));

        $response->assertRedirect(route('crimes.index'));
        $this->assertDatabaseMissing('crimes', ['id' => $crime->id]);
    }
}