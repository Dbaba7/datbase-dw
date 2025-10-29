<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrimeTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_authenticated_user_can_report_a_crime()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/crimes', [
            'crime_type' => 'Robbery',
            'description' => 'A robbery occurred at the city bank.',
            'location' => 'City Bank',
        ]);

        $this->assertDatabaseHas('crimes', [
            'crime_type' => 'Robbery',
        ]);

        $response->assertRedirect('/crimes');
    }
}
