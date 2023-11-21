<?php

namespace Database\Seeders;
use App\Models\Entreprise;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user_id = User::orderBy('id')->first()->id;
        $region_id =Region::orderBy('id')->first()->id;
        $entreprises = [
            [
                'nom' => 'Nom de l\'entreprise 2',
                'description' => 'Description de l\'entreprise 2',
                'adresse' => 'Adresse de l\'entreprise 2',
                'site_web' => 'http://www.entreprise2.com',
                'date_creation' => '2022-02-01',
                'user_id' =>$user_id ,
                'region_id' =>$region_id,
                // 'region_id' =>2,
                'logo' => 'entreprise2.png',
                'statut' => 'valide',
            ],

        ];

        foreach ($entreprises as $entreprise) {
            Entreprise::create($entreprise);
        }
    }
}
