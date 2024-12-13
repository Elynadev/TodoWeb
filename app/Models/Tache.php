<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    // Les attributs que vous pouvez remplir
    protected $fillable = [
        'titre',
        'description',
        'statut',
        'date_limite',
        'user_id', // Assurez-vous d'ajouter cette ligne si vous gérez les utilisateurs
    ];

    // Définir la relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
