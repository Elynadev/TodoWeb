<!DOCTYPE html>
<html>
<head>
    <title>Rappel de Tâche</title>
</head>
<body>
    <h1>Rappel de Tâche</h1>
    <p>Bonjour,</p>
    <p>Cette tâche approche de sa date limite :</p>
    <p><strong>Titre :</strong> {{ $tache->titre }}</p>
    <p><strong>Description :</strong> {{ $tache->description }}</p>
    <p><strong>Date Limite :</strong> {{ $tache->date_limite }}</p>
    <p>Merci de prendre les mesures nécessaires.</p>
</body>
</html>
