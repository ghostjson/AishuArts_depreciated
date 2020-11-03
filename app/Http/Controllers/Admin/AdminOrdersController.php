<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CartItem;
use App\Models\Product;
use Redirect;
class AdminOrdersController extends Controller
{
    public function orders(){
        $orders = Order::where('accepted',false)->orderBy('created_at', 'desc')->get();
        return view("admin/orders", compact('orders'));
    }

    public function completedOrders(){
        $orders = Order::where('accepted',true)->orderBy('created_at', 'desc')->get();
        return view("admin/completedOrders", compact('orders'));
    }

    public function show($order_id){
        $order = Order::find($order_id);
        $payment = Payment::where('order_id', $order->id)->first();
        $cart_items = CartItem::where('order_id', $order->id)->get();
        return view("admin/order", compact('order', 'payment', 'cart_items'));
    }

    public function acceptOrder($order_id){
        $order =  Order::find($order_id);
        $order->accepted = true;
        $order->shipped = true;
        $order->save();
        return Redirect::back();
    }

    // public function cancelOrder(){
    //     return view("admin/order_status");
    // }

    // public function completeOrder(){
    //     return view("admin/order_status");
    // }
}
