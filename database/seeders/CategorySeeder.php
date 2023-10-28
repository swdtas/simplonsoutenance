<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\UploadedFile;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Category::create([
            'nom_categorie' => 'Catégorie 1',
        ]);

        Category::create([
            'nom_categorie' => 'Catégorie 2',
        ]);
    }
}
