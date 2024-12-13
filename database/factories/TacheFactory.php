<?php


namespace Database\Factories;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Factories\Factory;

class TacheFactory extends Factory
{
    protected $model = Tache::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3), // Génère un titre de 3 mots
            'description' => $this->faker->paragraph(), // Génère une description
            'statut' => $this->faker->randomElement(['en cours', 'terminé']), // Statut aléatoire
            'date_limite' => $this->faker->dateTimeBetween('now', '+1 month'), // Date limite dans le futur
        ];
    }
}
