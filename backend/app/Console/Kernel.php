<?php

namespace App\Console;

use App\Http\Controllers\Api\FcmController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $controller = new FcmController();
            $controller->sendCheckInReminderPushNotification();
        })->timezone('Asia/Jakarta')->weekdays()->dailyAt('09:00');

        $schedule->call(function () {
            $controller = new FcmController();
            $controller->sendCheckOutReminderPushNotification();
        })->timezone('Asia/Jakarta')->weekdays()->dailyAt('19:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
