@extends('layouts.app')

@section('content')
    <h1>Ajouter une nouvelle tâche</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="status">Statut</label>
        <select id="status" name="status" required>
            <option value="en cours">En cours</option>
            <option value="terminé">Terminé</option>
        </select><br>
        <label for="due_date">Date limite</label>
        <input type="datetime-local" id="due_date" name="due_date" required><br>
        <button type="submit">Ajouter</button>
    </form>
@endsection
