<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            [
                'nom' => 'Ouagadougou',
            ],
            [
                'nom' => 'Koudougou',
            ],
            // Ajoutez d'autres régions si nécessaire
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
