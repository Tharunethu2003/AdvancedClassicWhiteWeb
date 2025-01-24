<?php

// app/Http/Controllers/ProductController.php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Store logic
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Update logic
    }

    public function destroy(Product $product)
    {
        // Delete logic
    }

    
}
