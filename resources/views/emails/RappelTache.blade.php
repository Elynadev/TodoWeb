{{-- <!DOCTYPE html>
<html>
<head>
    <title>Rappel de Tâche</title>
</head>
<body>
    <h1>Rappel: {{ $tache->titre }}</h1>
    <p>Vous avez une tâche qui approche de sa date limite :</p>
    <p>Description: {{ $tache->description }}</p>
    <p>Date limite: {{ $tache->date_limite }}</p>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rappel de Tâche</title>
</head>
<body>
    <h1>Rappel de Tâche</h1>
    <p><strong>Titre :</strong> {{ $tache->titre }}</p>
    <p><strong>Description :</strong> {{ $tache->description }}</p>
    <p><strong>Statut :</strong> {{ $tache->statut }}</p>
    <p><strong>Date limite :</strong> {{ $tache->date_limite }}</p>
</body>
</html>
