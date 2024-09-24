<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use App\Console\Commands\FetchUsers;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // Tests for UserController
    public function test_user_can_be_fetched()
    {
        User::create([
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $response = $this->get('/api/users');

        $response->assertStatus(200)
                 ->assertJsonStructure(['*' => ['id', 'email', 'first_name', 'last_name']]);
    }

    public function test_user_can_be_searched_by_email()
    {
        User::create([
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $response = $this->get('/api/users?query=test@example.com');

        $response->assertStatus(200)
                 ->assertJsonStructure(['*' => ['id', 'email', 'first_name', 'last_name']]);
    }

    public function test_user_can_be_searched_by_first_name()
    {
        User::create([
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $response = $this->get('/api/users?query=Test');

        $response->assertStatus(200)
                 ->assertJsonStructure(['*' => ['id', 'email', 'first_name', 'last_name']]);
    }

    public function test_searching_non_existent_user_returns_empty_response()
    {
        $response = $this->get('/api/users?query=nonexistent@example.com');

        $response->assertStatus(200)
                 ->assertJson([]);
    }


    public function test_fetch_users_command_with_no_users()
    {
        // Mock the API response for no users
        Http::fake([
            'reqres.in/api/users*' => Http::sequence()
                ->push(['data' => [], 'total_pages' => 1]),
        ]);

        // Run the command
        $this->artisan('users:fetch')
             ->expectsOutput('Page 1 users fetched and stored successfully.')
             ->assertExitCode(0);

        // Check that no users were created in the database
        $this->assertDatabaseCount('users', 0);
    }
}
