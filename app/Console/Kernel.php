<?php

namespace App\Console;

use App\Models\Activities;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        Commands\UpdateClassroomStatus::class,
    ];
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Logic to check and update classroom statuses
            Activities::where('end_time', '<=', now())->delete();
        })->everyMinute(); // Run the task every minute
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}