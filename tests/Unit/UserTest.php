<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Add this trait

    public function test_user_can_be_created()
    {
        $user = User::create([
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_user_can_be_fetched()
    {
        // First, create a user to fetch
        User::create([
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $response = $this->get('/api/users?search=test@example.com');

        $response->assertStatus(200)
                 ->assertJsonStructure(['*' => ['id', 'email', 'first_name', 'last_name']]);
    }
}
