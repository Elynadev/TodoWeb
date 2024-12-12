<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Afficher toutes les tâches
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Afficher le formulaire pour ajouter une tâche
    public function create()
    {
        return view('tasks.create');
    }

    // Enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:en cours,terminé',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => auth()->id(), // Assumer que l'utilisateur est authentifié
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    // Afficher le formulaire pour modifier une tâche
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Mettre à jour une tâche existante
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:en cours,terminé',
            'due_date' => 'required|date',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprimer une tâche
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
