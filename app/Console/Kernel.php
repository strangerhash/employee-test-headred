<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

namespace App\Console;


class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\FetchUsers::class, // Ensure this is included
    ];

    protected function schedule(Schedule $schedule): void
    {
        // Schedule your command here
        $schedule->command('users:fetch')->hourly();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
