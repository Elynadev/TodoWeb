@extends('layouts.app')

@section('content')
    <h1>Modifier la tâche</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}" required><br>
        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ $task->description }}</textarea><br>
        <label for="status">Statut</label>
        <select id="status" name="status" required>
            <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
            <option value="terminé" {{ $task->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
        </select><br>
        <label for="due_date">Date limite</label>
        <input type="datetime-local" id="due_date" name="due_date" value="{{ $task->due_date->format('Y-m-d\TH:i') }}" required><br>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
