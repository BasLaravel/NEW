<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use Cart;

class CartController extends Controller
{
    public function addToCart($id)

    {

      $product = Laptop::find($id);

      Cart::add(['id' => $product->id, 'name' => $product->title, 'qty' => 1, 'price' => 999,
       'options' => ['product' => $product]]);

      return back();


    }

    public function destroy($rowId)
    {


      //dd('test');

        Cart::remove($rowId);
        return redirect()->back();

    }

    public function index()
    {

    $cart = Cart::content();


    return view('cart.index',['data'=>$cart]);
    }

}
