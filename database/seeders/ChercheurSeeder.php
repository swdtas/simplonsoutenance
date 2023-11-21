<?php

namespace Database\Seeders;
// Database\Seeders\ChercheurSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Chercheur;
use Illuminate\Database\Seeder;

class ChercheurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérez l'id d'un utilisateur existant (à ajuster selon vos besoins)
        $user_id ='9aa96670-5d5b-42bc-806e-f99a6ec04ae4';
        Chercheur::create([
            'nom' => 'Nom du chercheur',
            'prenom' => 'Prénom du chercheur',
            'adresse' => 'Adresse du chercheur',
            'date_naissance' => '1990-01-01',
            'genre' => 'Homme',
            'telephone' => '0123456789',
            'email' => 'chercheur@example.com',
            'statut_matrimonial' => 'Célibataire',
            'user_id' => $user_id,
            'photo' => 'photo.jpg',
            'statut' => 'valide',
        ]);

    }
}
