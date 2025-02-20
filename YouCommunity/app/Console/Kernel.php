<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Event;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Exemple de tâche pour mettre à jour les événements passés
        $schedule->call(function () {
            Event::where('date_heure', '<', now())
                ->where('status', 'A venir')
                ->update(['status' => 'Passé']);
        })->daily(); // Exécuter une fois par jour
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
