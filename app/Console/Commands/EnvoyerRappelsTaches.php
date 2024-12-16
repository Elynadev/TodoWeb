<?php

namespace App\Console\Commands;

use App\Mail\RappelTache;
use App\Models\Tache;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EnvoyerRappelsTaches extends Command
{
    protected $signature = 'rappels:taches';
    protected $description = 'Envoyer des rappels pour les tâches dont la date limite approche';

    public function handle()
    {
        $taches = Tache::where('date_limite', '=', Carbon::tomorrow()->toDateString())->get();

        foreach ($taches as $tache) {
            Mail::to('recipient@example.com')->send(new RappelTache($tache)); // Remplacez par l'adresse e-mail souhaitée
            $this->info('Rappel envoyé pour la tâche : ' . $tache->titre);
        }
    }
}
