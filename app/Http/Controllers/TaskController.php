<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        // return view('tasks.index', compact('tasks'));

         // Récupérer les tâches en fonction de leur statut
         $tasksEnCours = Task::where('status', 'en_cours')->get();
         $tasksTerminees = Task::where('status', 'terminée')->get();
             // Passer les données à la vue
        return view('tasks.index', compact('tasksEnCours', 'tasksTerminees'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'status' => 'required|in:en_cours,terminée,annulée',
    //         'due_date' => 'required|date',
    //     ]);

    //     Task::create([
    //         'title' => $request->input('title'),
    //         'description' => $request->input('description'),
    //         'status' => $request->input('status'),
    //         'due_date' => $request->input('due_date'),
    //         'user_id' => 2, // Simulez l'utilisateur connecté
    //     ]);

    //     return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    // }


    public function store(Request $request)
    {
       // Validation des données
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:en_cours,terminee',
        'due_date' => 'required|date|after_or_equal:today',
    ]);

    // Ajout de l'utilisateur connecté comme propriétaire de la tâche
    $validated['user_id'] = auth()->id();

    // Création de la tâche
    Task::create($validated);

    return redirect()->route('tasks.create')->with('success', 'La tâche a été créée avec succès.');
}



    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:en_cours,terminée,annulée',
            'due_date' => 'required|date',
        ]);

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'due_date' => $request->input('due_date'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}


