<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TacheController extends Controller
{
    public function index()
    {
        // Récupère toutes les tâches
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

    public function edit(Tache $tache)
    {
        return Inertia::render('Edit', ['tache' => $tache]);
    }

    public function update(Request $request, Tache $tache)
    {
        // Validation des données entrantes
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|string|in:en cours,terminé,à réviser',
            'date_limite' => 'required|date',
        ]);

        // Mise à jour de la tâche
        $tache->update($request->all());

        return redirect()->route('taches.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy(Tache $tache)
    {
        // Suppression de la tâche
        $tache->delete();

        return redirect()->route('taches.index')->with('success', 'Tâche supprimée avec succès.');
    }

    public function show()
    {
        return Inertia::render('Create');
    }
}
