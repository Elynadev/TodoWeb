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
            'statut' => 'required|string|in:en cours,terminé',
            'date_limite' => 'required|date',
        ]);

        // Création de la tâche sans l'ID utilisateur
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
            'statut' => 'required|string|in:en cours,terminé',
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
}
