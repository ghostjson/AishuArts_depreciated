<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view('partials.about');
    }

    public function contact(){
        return view('partials.contact');
    }

    public function sendMessage(Request $request){
        //send a mail
        return redirect('/');
    }

}
