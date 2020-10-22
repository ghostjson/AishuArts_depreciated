<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Cart;
use Session;

class OrdersController extends Controller
{
    public function checkout(){
        return view("checkout");
    }

    public function createOrder(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'address' => 'required|max:255',
        //     'district' => 'required',
        //     'state' => 'required',
        //     'country' => 'required',
        //     'pincode' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|max:10',
        // ], [
        //     'name.required' => 'Name is required',
        //     'district.required' => 'district is required',
        //     'state.required' => 'state is required',
        //     'country.required' => 'country is required',
        //     'pincode.required' => 'pincode is required',
        //     'email.required' => 'email is required',
        //     'phone.required' => 'phone is required'
        // ]);
        // $order = new Order();
        // $order->payment_id = $request->input('payment_id');
        // $order->payment_id = $request->input('total');
        // $order->name = $request->input('name');
        // $order->address = $request->input('address');
        // $order->district = $request->input('district');
        // $order->state = $request->input('state');
        // $order->country = $request->input('country');
        // $order->pincode = $request->input('pincode');
        // $order->email = $request->input('email');
        // $order->phone = $request->input('phone');
        // $order->payment_id = $request->input('shipped');
        // $order->payment_id = $request->input('accepted');
        // $order->create();
        
        $input = $request->all();
        $order = Order::create($input);
        $request->session()->put('order', $order);
        return redirect()->route('payment', ['order_id' => $order->id]);
    }

    public function complete(Request $request, $order_id){
        $order = Order::find($order_id);
        $request->session()->flush();
        return view("complete", compact("order"));
    }
}
