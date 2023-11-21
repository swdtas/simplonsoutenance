<?php

namespace Database\Seeders;

use App\Models\Domaine;
use App\Models\Entreprise;
use App\Models\Technologie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $domaine_id = Domaine::orderBy('id')->first()->id;
        $entreprise_id =Entreprise::orderBy('id')->first()->id;
        $technologies= [
            [
                'Description' => 'Description de l\'technologie 2',
                'domaine_id' =>$domaine_id ,
                'entreprise_id' =>$entreprise_id,
            ],

        ];

        foreach ($technologies as $technologie) {
            Technologie::create($technologie);
        }
      
    }
}

