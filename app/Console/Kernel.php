<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Your console commands can be registered here
        'users:fetch'
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:fetch')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Include commands from app/Console/Commands
        require base_path('routes/console.php');
    }
}
