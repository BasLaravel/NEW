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

    return view('cart.order', ['data'=>$cart], [
        'information' => $information[0],
    ]);
}


public function update(Request $request)
{

  //return response($request);

  //dd($rowId);
   // $qty = $request->qty;
   // $prodId = $request->prodId;


    Cart::update($request->id, $request->qty);

    $price = Cart::get($request->id);
    $count = Cart::count();
    $total = Cart::total();
    $subtotal = Cart::subtotal();


    return response()->json(['count' => $count, 'total' => $total, 'subtotal' => $subtotal, 'price'=>$price]);

    //return back();
    // $cartItems = Cart::content();
    // return view('cart.upCart', compact('cartItems')->width('status', 'cart updated'));

}
}
