<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://reqres.in/api/users');
        $users = $response->json()['data'];
    
        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                ['first_name' => $user['first_name']]
            );
        }
    }
    
}
