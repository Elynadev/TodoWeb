<?php

namespace App\Http\Controllers;

use App\Mail\SimpleMail;
use App\Mail\TacheRappel;
use App\Mail\TaskReminder;
use App\Models\Tache;
use App\Notifications\TaskReminderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;

class TacheController extends Controller
{
    public function index()
    {

        // $taches = Tache::paginate(4);
        // // Récupère toutes les tâches
        $taches = Tache::all();

        return Inertia::render('Index', ['taches' => $taches]);
    }

    public function indexByStatus()
    {
        // Récupère les tâches groupées par statut
        $tachesEnCours = Tache::where('statut', 'en cours')->get();
        $tachesTerminees = Tache::where('statut', 'terminé')->get();
        $tachesAReviser = Tache::where('statut', 'à réviser')->get();

        return Inertia::render('IndexByStatus', [
            'tachesEnCours' => $tachesEnCours,
            'tachesTerminees' => $tachesTerminees,
            'tachesAReviser' => $tachesAReviser,
        ]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(Request $request)
    {
        // Validation des données entrantes
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string|in:en cours,terminé,à réviser',
            'date_limite' => 'required|date',
        ]);

        // Création de la tâche
        Tache::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => $request->statut,
            'date_limite' => $request->date_limite,
        ]);

        return redirect()->route('taches.index')->with('success', 'Tâche ajoutée avec succès.');
    }


    // Afficher le formulaire de modification
    public function edit($id)
    {
        $tache = Tache::find($id);

        if (!$tache) {
            return redirect()->route('taches.index')->with('error', 'Tâche non trouvée');
        }

        return Inertia::render('Taches/Edit', [
            'tache' => $tache,
        ]);
    }

    // Mettre à jour la tâche
    public function update(Request $request, $id)
    {
        $tache = Tache::find($id);

        if (!$tache) {
            return redirect()->route('taches.index')->with('error', 'Tâche non trouvée');
        }

        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string|max:50',
            'date_limite' => 'nullable|date',
        ]);

        // Mise à jour de la tâche
        $tache->update($request->all());

        // Redirection vers l'index avec message de succès
        return redirect()->route('taches.index')->with('success', 'Tâche mise à jour avec succès');
    }
// Méthode pour supprimer une tâche

    // Méthode pour supprimer une tâche
    public function destroy($id)
    {
        // Trouver la tâche par ID
        $tache = Tache::find($id);

        if (!$tache) {
            return redirect()->route('taches.index')->with('error', 'Tâche non trouvée');
        }

        // Supprimer la tâche
        $tache->delete();

        // Retourner une redirection vers la page d'index avec un message de succès
        return redirect()->route('taches.index')->with('success', 'Tâche supprimée avec succès');
    }

    public function show()
    {
        return Inertia::render('Create');
    }

    public function sendEmail()
    {
        $message = "Bonjour d'ab!";
        Mail::to('recipient@example.com')->send(new SimpleMail($message));

        return 'Email envoyé!';
    }

    public function testReminder()
    {
        $tasks = Tache::where('date_limite', '=', now()->addDay())->get();

        foreach ($tasks as $task) {
            $task->user->notify(new TaskReminderNotification($task));
        }

        return 'Rappels envoyés!';
    }

    public function sendReminder()
    {
        // Récupérer les tâches dont la date limite est demain
        $tasks = Tache::where('date_limite', '=', now()->addDay())->get();

        foreach ($tasks as $task) {
            // Envoyer l'e-mail de rappel
            Mail::to($task->user->email)->send(new TaskReminder($task));
        }

        return 'Rappels envoyés!';
    }





    public function envoyerRappel($id)
    {
        // Récupérer la tâche depuis la base de données
        $tache = Tache::findOrFail($id);

        // Envoyer l'e-mail
        Mail::to('destinataire@example.com') // Remplace par l'adresse e-mail du destinataire
            ->send(new TacheRappel($tache));

        return response()->json([
            'message' => 'Rappel envoyé avec succès !'
        ]);
    }

}
