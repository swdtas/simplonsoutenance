<?php

namespace Database\Seeders;

use App\Models\Candida;
use App\Models\Domaine;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chercheur_id ='1';
        $region_id =Region::orderBy('id')->first()->id;
        $domaine_id =Domaine::orderBy('id')->first()->id;
        Candida::create([
            'resume_professionnel' => 'Résumé professionnel du candidat',
            'cv' => 'nom_du_cv.pdf',
            'linkedin' => 'https://www.linkedin.com/in/candidat',
            'github' => 'https://github.com/candidat',
            'region_id' => $region_id,
            'chercheur_id' => $chercheur_id,
            'domaine_id' => $domaine_id,
        ]);
    }
}
