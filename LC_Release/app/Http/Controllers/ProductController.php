<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function index()
    {
        
        $products = Product::all();
        // récupére les données de la table produits
        return view('catalogue', [
            'products' => $products
        ]);
        // permet de les afficher
    }
}
