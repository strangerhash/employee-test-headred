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
        $currentPage = 1;
        // Start from the first page

        do {
            $response = Http::get( "https://reqres.in/api/users?page={$currentPage}" );

            if ( $response->successful() ) {
                $users = $response->json()[ 'data' ];

                // Store or update each user in the database
                foreach ( $users as $userData ) {
                    User::updateOrCreate(
                        [ 'email' => $userData[ 'email' ] ], // Unique field
                        [
                            'first_name' => $userData[ 'first_name' ],
                            'last_name' => $userData[ 'last_name' ],
                        ]
                    );
                }

                // Get the total number of pages from the API response
                $totalPages = $response->json()[ 'total_pages' ];

                $this->info( "Page {$currentPage} users fetched and stored successfully." );
                $currentPage++;
                // Move to the next page
            } else {
                $this->error( 'Failed to fetch users from the API: ' . $response->body() );
                break;
                // Exit the loop if the API call fails
            }

        }
        while ( $currentPage <= $totalPages );
        // Continue until all pages have been fetched

        $this->info( 'All users fetched and stored successfully.' );
    }
}

