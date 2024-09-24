<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use app\Console\Commands\FetchUsers;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


//For Testing Added 2 minutes Time
Artisan::command('users:fetch', function () {
   FetchUsers::handle();
})->purpose('Fetch and Store User Data')->everyTwoMinutes();
