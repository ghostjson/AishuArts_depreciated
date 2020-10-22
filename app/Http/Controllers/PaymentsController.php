<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class PaymentsController extends Controller
{
    public function payment(Request $request, $order_id){
        $order = $request->session()->get('order');
        $cart = $request->session()->get('cart');
        $order->total = $cart->totalPrice;
        $request->session()->put('order',$order);
        Order::find($order_id)->update(['total' => $order->total]);
        return view("payment", compact('cart','order'));
    }
}
