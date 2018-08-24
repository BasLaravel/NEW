<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UsersExtendedInformation;
use Cart;

class OrderController extends Controller
{

    public function index()
    {
        $information = UsersExtendedInformation::where('user_id', auth()->id())->get();
        if(!isset($information[0])){
            $information[0] = null;
        }

        //dd($information);
        $cart = Cart::content();

        return view('cart.order',[
            'data'=>$cart, 
            'information' => $information[0],
        ]);
    }



}
