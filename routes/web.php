<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductsController;
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


//ADMIN ROUTES
Route::get("/admin", function (){
    return redirect('/admin/dashboard');
});

Route::get("/admin/dashboard", [AdminPagesController::class, 'dashboard'])->middleware('auth');

Route::get("/admin/orders", [AdminOrdersController::class, 'orders'])->middleware('auth');
Route::get("/admin/completedOrders", [AdminOrdersController::class, 'completedOrders'])->middleware('auth');
Route::get("/admin/order/{id}", [AdminOrdersController::class, 'show'])->middleware('auth');
Route::get("/admin/acceptOrder/{id}", [AdminOrdersController::class, 'acceptOrder'])->middleware('auth');

Route::get("/admin/products", [AdminProductsController::class, 'products'])->middleware('auth');
Route::get("/admin/product/new", [AdminProductsController::class, 'new'])->middleware('auth');
Route::get("/admin/product/{id}/edit", [AdminProductsController::class, 'edit'])->middleware('auth');
Route::post("/admin/product/create", [AdminProductsController::class, 'create'])->middleware('auth');
Route::post("/admin/product/update", [AdminProductsController::class, 'update'])->middleware('auth');


// route to show the login form
Route::get("/admin/login", [AdminPagesController::class, 'showLogin']);
// Route::get('/admin/login', 'AdminPagesController@showLogin')->name('showLogin');
// route to process the form
Route::post("/admin/doLogin", [AdminPagesController::class, 'doLogin']);
// route to logout
Route::get("/admin/doLogout", [AdminPagesController::class, 'doLogout'])->middleware('auth');

