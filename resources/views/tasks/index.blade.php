<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold text-center mb-6">Gestion des Tâches</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- En cours -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-xl font-bold text-blue-600 mb-4">Notes en cours</h3>
                <ul class="space-y-4">
                    @forelse ($tasksEnCours as $task)
                        <li class="bg-blue-100 p-3 rounded-lg">
                            <h4 class="font-semibold">{{ $task->title }}</h4>
                            <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                            <span class="text-blue-500 text-xs">Échéance: {{ $task->due_date }}</span>
                        

                        </li>
                    @empty
                        <p class="text-gray-500">Aucune tâche en cours.</p>
                    @endforelse
                </ul>
            </div>

            <!-- Terminées -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-xl font-bold text-green-600 mb-4">Notes terminées</h3>
                <ul class="space-y-4">
                    @forelse ($tasksTerminees as $task)
                        <li class="bg-green-100 p-3 rounded-lg">
                            <h4 class="font-semibold">{{ $task->title }}</h4>
                            <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                            <span class="text-green-500 text-xs">Échéance: {{ $task->due_date }}</span>
                        </li>
                    @empty
                        <p class="text-gray-500">Aucune tâche terminée.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
