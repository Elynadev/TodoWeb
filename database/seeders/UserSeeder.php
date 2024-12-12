<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Utilisateur Exemple',
            'email' => 'exemple@domain.com',
            'password' => bcrypt('password123'), // Assure-toi de hasher le mot de passe
        ]);
    }
}
