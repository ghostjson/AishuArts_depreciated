<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);
Route::get('/product/{id}', [ProductsController::class, 'product']);
Route::get("/products/{category_id}", [ProductsController::class, 'products']);
Route::get("/addProductToCart/{product_id}", [ProductsController::class, 'addProductToCart']);
Route::get("/deleteProductFromCart/{product_id}", [ProductsController::class, 'deleteProductFromCart']);
Route::get("/cart", [ProductsController::class, 'cart']);
Route::post("/updateCartQuantity", [ProductsController::class, 'updateCartQuantity']);

Route::get("/checkout", [OrdersController::class, 'checkout']);
Route::post("/createOrder", [OrdersController::class, 'createOrder']);
Route::get("/complete/{order_id}", [OrdersController::class, 'complete']);
// Route::post("/payment/{order_id}", [PaymentsController::class, 'payment']);
Route::get('/payment/{order_id}', 'App\Http\Controllers\PaymentsController@payment')->name('payment');

Route::get("/sortProducts", [ProductsController::class, 'sortProducts']);

Route::get("/about", [PagesController::class, 'about']);
Route::get("/contact", [PagesController::class, 'contact']);
Route::post("/sendMessage", [PagesController::class, 'sendMessage']);

