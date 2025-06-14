<?php

namespace Database\Seeders;

use App\Models\Indicateur;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Indicateur::insert([
            [
                'user_id' => 1,
                'nom' => 'Tension artérielle',
                'valeur' => '125/80',
                'progression' => 75,
                'etat' => 'Dans la norme',
            ],
            [
                'user_id' => 1,
                'nom' => 'Fréquence cardiaque',
                'valeur' => '72 bpm',
                'progression' => 65,
                'etat' => 'Normale',
            ],
            [
                'user_id' => 1,
                'nom' => 'Glycémie',
                'valeur' => '1.0 g/L',
                'progression' => 40,
                'etat' => 'Dans la norme',
            ],
            [
                'user_id' => 1,
                'nom' => 'IMC',
                'valeur' => '22.3',
                'progression' => 55,
                'etat' => 'Poids normal',
            ],
        ]);

    }
}
