<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SitePubliController extends Controller
{
    public function showPublicProducts(Request $request)
{
    $categories = Category::all();
    $selectedCategory = $request->input('categorie', 'all');
    $searchTerm = $request->input('search');

    $productsQuery = ($selectedCategory == 'all') ? Product::query() : Product::whereHas('categorie', function ($query) use ($selectedCategory) {
        $query->where('id', $selectedCategory);
    });

    if ($searchTerm) {
        $productsQuery->where('nom_product', 'like', '%' . $searchTerm . '%');
    }

    $products = $productsQuery->get();

    return view('frontoffice.accueil', compact('products', 'categories', 'selectedCategory'));
}

}
