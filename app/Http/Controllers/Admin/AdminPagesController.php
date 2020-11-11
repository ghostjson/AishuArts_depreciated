<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Payment;


class AdminPagesController extends Controller
{
    public function dashboard(){
        $new_orders_count = count(Order::where('accepted',false)->orderBy('created_at', 'desc')
            ->get());
        $completed_orders_count = count(Order::where('accepted',true)->orderBy('created_at', 'desc')
            ->get());
        $total_payment_this_week = Payment::where('paid',true)->sum('amount');
        return view("admin/dashboard", compact('new_orders_count', 'completed_orders_count', 'total_payment_this_week'));
    }

    public function showLogin(){
        return view('admin/login');
    }

    public function doLogin(Request $request){
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator = Validator::make($request->all(), $rules);
            $userdata = array(
                'email'     => $request->input('email'),
                'password'  => $request->input('password')
            );

         // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('admin/login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {
                if (Auth::attempt($userdata)) {

                    // validation successful!
                    // redirect them to the secure section or whatever
                    // return Redirect::to('secure');
                    // for now we'll just echo success (even though echoing in a controller is bad)
                    return redirect('admin/dashboard');

                } else {

                    // validation not successful, send back to form
                    return redirect('admin/login')->withErrors(['Invalid Username or Password. Please enter valid credentials.']);

                }
            }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
