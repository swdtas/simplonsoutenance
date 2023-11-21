<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\Offres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérez l'id d'une entreprise existante (à ajuster selon vos besoins)
        $entreprise_id =Entreprise::orderBy('id')->first()->id;

        // Créez une offre
        Offres::create([
            'titre' => 'Titre de l\'offre',
            'description' => 'Description de l\'offre',
            'Profile' => 'Profil recherché',
            'entreprise_id' => $entreprise_id,
        ]);

       
    }
}
