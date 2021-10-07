<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();
        return view('product',[ "products" => $data ]);
    }
}