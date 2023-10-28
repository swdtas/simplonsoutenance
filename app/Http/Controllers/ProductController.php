<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('backoffice.product', compact('categories'));
    }  

    public function store(ProductRequest $request)
    {
        try {
            if ($request->hasFile('image_product')) {

                if (!Storage::disk('public')->exists('products')) {
                    Storage::disk('public')->makeDirectory('products');
                }
                $imagePath = $request->file('image_product')->store('products', 'public');
                $validatedData = $request->validated();
                $validatedData['image_product'] = Storage::url($imagePath);
                Product::create($validatedData);
                return redirect()->route('product.create')->with('success', 'Produit enregistré avec succès.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Veuillez sélectionner une image pour le produit.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de l\'enregistrement.');
        }
    }

    public function lister(Request $request)
    {
        // Récupérer toutes les catégories pour afficher le filtre
        $categories = Category::all();
    
        // Récupérer la catégorie sélectionnée depuis la requête
        $selectedCategory = $request->input('categorie', 'all');
    
        // Récupérer les produits en fonction de la catégorie sélectionnée
        $products = ($selectedCategory == 'all') 
            ? Product::all()  // Si 'Tous' est sélectionné, récupérer tous les produits
            : Product::whereHas('categorie', function ($query) use ($selectedCategory) {
                $query->where('id', $selectedCategory);
            })->get(); // Sinon, récupérer les produits de la catégorie sélectionnée
    
        return view('backoffice.list_product', compact('products', 'categories', 'selectedCategory'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        if (!$product) {
            return redirect()->route('product.create')->with('error', 'Produit introuvable.');
        }
    
        return view('backoffice.edit_produit', compact('product', 'categories'));
    }
    
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('product.create')->with('error', 'Produit introuvable.');
        }
    
        $validatedData = $request->validated();
    
        // Si une nouvelle image est téléchargée, gérer l'ancienne image
        if ($request->hasFile('image_product')) {
            // Supprimer l'ancienne image du produit du stockage
            if (Storage::disk('public')->exists($product->image_product)) {
                Storage::disk('public')->delete($product->image_product);
            }
            // Stocker la nouvelle image du produit
            $imagePath = $request->file('image_product')->store('products', 'public');
            $validatedData = $request->validated();
            $validatedData['image_product'] = Storage::url($imagePath);
        }
    
        // Mettre à jour le produit avec les données validées
        $product->update($validatedData);
    
        return redirect()->route('list_product')->with('success', 'Produit mis à jour avec succès.');
    }
    
        
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
    
            // Supprimez l'image du produit du stockage
            if (Storage::disk('public')->exists($product->image_product)) {
                Storage::disk('public')->delete($product->image_product);
            }
    
            // Supprimez le produit de la base de données
            $product->delete();
    
            return redirect()->back()->with('success', 'Produit supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du produit.');
        }
    }
}
