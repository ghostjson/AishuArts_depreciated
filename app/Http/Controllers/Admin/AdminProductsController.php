<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        $categories = Category::all();
        return view("admin/new_product", compact('categories'));
    }

    public function create(Request $request){
        // dd($request->file('image'));
        $validation = $request->validate([
            'image'  =>  'required|file|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);
    
        $file = $validation['image']; 
        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('product_images', $fileName);
        
        $request->file('image')->store('product_images');
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $fileName;
        $product->active = $request->input('active');
        $product->category_id = $request->input('category_id');
        $product->category = Category::find($product->category_id);
        $product->save();
        $products = Product::all();
        return redirect()->route('products', ['products' => $products]);
    }

    public function update(){
        return view("admin/products");
    }

    public function deactivate(){
        return view("admin/products");
    }
}
