<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category; // Assurez-vous d'importer le modèle Category

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = Category::where('id', 	
        '72bd23d9-93d8-41f2-83eb-de0418919316'
        )->value('id');

        Product::create([
            'nom_product' => 'Produit 1',
            'prix_product' => 50.99,
            'description_product' => 'Description du produit 1',
            'image_product' => 'chemin/vers/image1.jpg',
            'categorie_id' =>  $categoryId,
        ]);
      
    }
}
