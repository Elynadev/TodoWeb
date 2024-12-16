<?php

namespace App\Console;

use App\Mail\TaskReminder;
use App\Models\Tache;
use App\Notifications\TaskReminderNotification;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $tasks = Tache::where('date_limite', '=', now()->addDay())->get();

            foreach ($tasks as $task) {
                $task->user->notify(new TaskReminderNotification($task));  // Assurez-vous que `user` est une relation définie sur le modèle Tache
            }
        })->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
