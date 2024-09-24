<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class FetchUsers extends Command
{
    protected $signature = 'users:fetch';
    protected $description = 'Fetch users from ReqRes API and store in the database';

    public function handle()
    {
        $response = Http::get('https://reqres.in/api/users');

        if ($response->successful()) {
            $users = $response->json()['data'];

            foreach ($users as $userData) {
                User::updateOrCreate(
                    ['email' => $userData['email']], // Unique field
                    [
                        'first_name' => $userData['first_name'],
                        'last_name' => $userData['last_name'],
                    ]
                );
            }

            $this->info('Users fetched and stored successfully.');
        } else {
            $this->error('Failed to fetch users from the API.');
        }
    }
}
