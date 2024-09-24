<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Your console commands can be registered here
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('fetch:users')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Include commands from app/Console/Commands
        require base_path('routes/console.php');
    }
}
