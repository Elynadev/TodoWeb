<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une tâche</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold text-center mb-6">Modifier une Tâche</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-lg font-semibold">Titre</label>
                    <input type="text" id="title" name="title" value="{{ $task->title }}" class="w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg font-semibold">Description</label>
                    <textarea id="description" name="description" class="w-full p-2 border rounded-md" required>{{ $task->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-lg font-semibold">Statut</label>
                    <select id="status" name="status" class="w-full p-2 border rounded-md" required>
                        <option value="en_cours" {{ $task->status == 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminee" {{ $task->status == 'terminee' ? 'selected' : '' }}>Terminée</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block text-lg font-semibold">Date d'échéance</label>
                    <input type="date" id="due_date" name="due_date" value="{{ $task->due_date }}" class="w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Mettre à jour la tâche</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
