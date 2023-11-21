<?php

namespace Database\Seeders;

use App\Models\Domaine;
use Illuminate\Database\Seeder;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domaines= [
            [
                'nom' => 'Developpeur web',
            ],
            [
                'nom' => 'Developpeur mobile',
            ],
          
        ];

        foreach ($domaines as $domaine) {
            Domaine::create($domaine);
        }
    }
}
