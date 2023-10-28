<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('backoffice.categories', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        try {
           
            $validatedData = $request->validated();
            Category::create($validatedData);
            return redirect()->route('list_categorie')->with('success', 'Catégorie créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de la création de la catégorie.');
        }
    }

    public function lister()
    {
        $categories = Category::all();
        return view('backoffice.list_categorie', compact('categories'));
    }

    
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backoffice.edit_categorie', compact('category'));
    }
    
    public function update(CategoryRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $category = Category::findOrFail($id);
            $category->update($validatedData);
            return redirect()->route('list_categorie')->with('success', 'Catégorie mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de la mise à jour de la catégorie.');
        }
    }
    

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        foreach ($products as $product) {
            $product->delete();
        }
        $category->delete();
        return redirect()->route('list_categorie')->with('success', 'Catégorie supprimée avec succès.');
    }
    
    
}
