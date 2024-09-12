<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::all();

        return view('products', ['data' => $products]);
    }
}
