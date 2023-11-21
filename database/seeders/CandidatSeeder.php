<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\Chercheur;
use App\Models\Domaine;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Can;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérez l'id d'un utilisateur existant (à ajuster selon vos besoins)
        $chercheur_id ='1';
        $region_id =Region::orderBy('id')->first()->id;
        $domaine_id =Domaine::orderBy('id')->first()->id;
        Candidat::create([
            'resume_professionnel' => 'Résumé professionnel du candidat',
            'cv' => 'nom_du_cv.pdf',
            'lettre' => 'nom_de_la_lettre.pdf',
            'linkedin' => 'https://www.linkedin.com/in/candidat',
            'github' => 'https://github.com/candidat',
            'region_id' => $region_id,
            'chercheur_id' => $chercheur_id,
            'domaine_id' => $domaine_id,
        ]);
    }
}
