<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class AdminProductsController extends Controller
{
    public function products(){
        $products = Product::all();
        return view("admin/products", compact('products'));
    }

    public function show(){
        return view("admin/product_details");
    }

    public function new(){
        return view("admin/products");
    }

    public function create(){
        return view("admin/products");
    }

    public function update(){
        return view("admin/products");
    }

    public function deactivate(){
        return view("admin/products");
    }
}
