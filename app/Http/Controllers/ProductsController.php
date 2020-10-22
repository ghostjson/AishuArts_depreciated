<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use Session;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::where("active","=",true)->paginate(12);
        $products_sorted = Product::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        return view("index", compact("products","categories", "products_sorted"));
    }
    public function product($id){
        $product = Product::find($id);
        return view("product", compact("product"));
    }
    public function products($category_id){
        $products = Product::where('category_id','=',$category_id)->where("active","=",true)->paginate(12);
        $products_sorted = Product::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        return view("products", compact("products","categories", "products_sorted"));
    }

    public function addProductToCart(Request $request, $id){
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($id);
        $cart->addItem($id,$product);
        $request->session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function updateCartQuantity(Request $request){
        $product_id = $request->input('product_id');
        $quantity = $request->input('new_quantity');
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);
        $product = Product::find($product_id);
        $cart->updateItem($product_id,$quantity);
        // $cart = new Cart($cart);
        // $cart->updatePriceAndQuantity();
        $request->session()->put('cart', $cart);
        return  ['totalPrice' => $cart->totalPrice, 'productPrice' => (float) str_replace("₹","",$product->price)];
    }

    public function deleteProductFromCart(Request $request, $id){
        $cart = $request->session()->get('cart');
        
        if(array_key_exists($id, $cart->items)){
            unset($cart->items[$id]);
        }
        $updatedCart = new Cart($cart);
        $updatedCart->updatePriceAndQuantity();
        $request->session()->put('cart', $updatedCart);
        return redirect('/cart');
    }

    public function cart(){
        $cart = Session::get('cart');

        if($cart != null && $cart->items != null){
            return view("cart", compact('cart'));
        }else{
            return view("cart_empty");
        }
    }

    public function sortProducts(Request $request){
        $sortBy =  $request->input('sort_by');
        switch ($sortBy) {
            case "date":
                $products = Product::orderBy('created_at', 'desc')->paginate(12);
              break;
            case "price":
                $products = Product::orderBy('price', 'ASC')->paginate(12);
              break;
            case "price-desc":
                $products = Product::orderBy('price', 'DESC')->paginate(12);
              break;
            default:
            $products = Product::where("active","=",true)->paginate(12);
          }
          $products_sorted = Product::orderBy('created_at', 'desc')->take(3)->get();
          $categories = Category::all();
          $products->setPath('/');
          return view("partials.products",compact('products','categories', 'products_sorted'))->render();
    }
}
