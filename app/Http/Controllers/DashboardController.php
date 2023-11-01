<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{  
    public function create()
    {
        $categories = Category::all();
        $numberOfCategories = Category::count();
        $productsCountByCategory = [];

        foreach ($categories as $category) {
            $productsCount = Product::where('categorie_id', $category->id)->count();
            $productsCountByCategory[$category->id] = $productsCount;
        }

        return view('backoffice.dashboard', compact('numberOfCategories', 'productsCountByCategory', 'categories'));
    }
}
