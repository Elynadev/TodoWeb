@extends('layouts.app')

@section('content')
    <h1>Liste des tâches</h1>
    <a href="{{ route('tasks.create') }}">Ajouter une nouvelle tâche</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong><br>
                {{ $task->description }}<br>
                Statut: {{ $task->status }}<br>
                Date limite: {{ $task->due_date }}<br>
                <a href="{{ route('tasks.edit', $task) }}">Modifier</a> |
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
