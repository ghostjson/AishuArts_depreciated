<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CartItem;
use App\Cart;
use Session;

class OrdersController extends Controller
{
    public function checkout()
    {
        return view("checkout");
    }

    public function createOrder(Request $request)
    {
        //get all order params from request
        $input = $request->all();
        $order = Order::create($input);
        //get all cart params from session
        $cart = $request->session()->get('cart');
        //list all products and quanitities
        $cart = new Cart($cart);
        $items = $cart->getProductItemsList();
        $cartItems = [];
        foreach ($items as $item) {
            $cartItem = new CartItem();
            $cartItem->quantity = $item['quantity'];
            $cartItem->price = $item['price'];
            $cartItem->product_id = $item['data']['id'];
            $product = Product::find($cartItem->product_id);
            $cartItem->product_name = $product->name;
            $cartItem->product_image = $product->image;
            array_push($cartItems, $cartItem);
        }
        //calculate total amount
        $total_amount = $cart->totalPrice;
        //create payment
        $payment = new Payment();
        $payment->amount = $total_amount;
        $payment->order_id = $order->id;
        $payment->paid = true;
        $payment->save();
        //create order
        $order->payment_id = $payment->id;
        $order->total = $total_amount;
        $order->save();
        //create order_product
        foreach ($cartItems as $cart_item) {
            $cart_item->order_id = $order->id;
            $cart_item->save();
        }
        $request->session()->put('order', $order);
        return redirect()->route('payment', ['order_id' => $order->id]);
    }

    public function complete(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        $request->session()->flush();
        return view("complete", compact("order"));
    }
}
