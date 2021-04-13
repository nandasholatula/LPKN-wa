<?php

namespace App\Console;

use App\Http\Controllers\DialogController;
use App\Models\Dialog;
use App\Models\Message;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (count(Dialog::all()) == 0 && count(Message::all()) == 0) {
            $schedule->command('dialogs:first')->everyMinute();
            $schedule->command('messages:first')->everyMinute();
        } else {
            $schedule->command('dialogs')->everyMinute();
            $schedule->command('messages')->everyMinute();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
