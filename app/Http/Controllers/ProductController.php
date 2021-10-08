<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all(); // Consultamos todos los productos de la base de datos
        return view('product', [ "products" => $data ]);
    }
    
}