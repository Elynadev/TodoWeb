<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une tâche</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold text-center mb-6">Créer une Tâche</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-lg font-semibold">Titre</label>
                    <input type="text" id="title" name="title" class="w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg font-semibold">Description</label>
                    <textarea id="description" name="description" class="w-full p-2 border rounded-md" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-lg font-semibold">Statut</label>
                    <select id="status" name="status" class="w-full p-2 border rounded-md" required>
                        <option value="en_cours">En cours</option>
                        <option value="terminee">Terminée</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block text-lg font-semibold">Date d'échéance</label>
                    <input type="date" id="due_date" name="due_date" class="w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Créer la tâche</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Afficher SweetAlert si un message de session est défini -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>

</body>
</html>
