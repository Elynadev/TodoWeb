<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Récupérer un utilisateur existant (ici l'utilisateur avec id = 1)
        $user = User::find(1); // Assure-toi que cet utilisateur existe dans ta table

        // Si l'utilisateur existe, créer des tâches
        if ($user) {
            foreach (range(1, 50) as $index) {
                Task::create([
                    'title' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'status' => $faker->randomElement(['en cours', 'terminé']),
                    'due_date' => $faker->dateTimeBetween('+1 days', '+30 days'),
                    'user_id' => $user->id, // Assigner l'ID de l'utilisateur
                ]);
            }
        } else {
            echo "Aucun utilisateur trouvé avec l'ID 1. Veuillez en ajouter un avant d'exécuter le seeder.";
        }
    }
}
