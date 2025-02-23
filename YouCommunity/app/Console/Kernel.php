<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $updated = Event::where('date_heure', '<', now())
            ->where('status', 'A venir')
            ->update(['status' => 'Passé']);

        Log::info("$updated événements mis à jour."); // Pour vérifier les mises à jour dans logs
    })->everyMinute(); // Exécution chaque minute (peut être changé à `hourly()` ou `daily()`)
}


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
