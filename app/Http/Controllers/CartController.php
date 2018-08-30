<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use Cart;

class CartController extends Controller
{


  public function index()
    {
      $cart = Cart::content();

      return view('cart.index',['data'=>$cart]);
    }



    public function addToCart(Request $request, $ean)
    {

      $product = $this->findProduct($ean);

      Cart::add(['id' => $product->ean, 'name' => $product->title, 'qty' => 1, 'price' => $product->price,
       'options' => ['product' => $product]]);

       if($request->ajax()){
         return response(Cart::count());
       }
       return back();
    }



    public function findProduct($ean){

      $product=[];
      $i=0;
      $models = array("Laptop","Desktop","Monitor");

      foreach($models as $key => $value){
          $class = "App\\".$value;
          $product = $class::where('ean',$ean)->get();
          if(isset($product[0])){
           return $product[0];
          }
          $i++;
      }
    }




    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();

    }

    
    
    public function update(Request $request)
    {

        Cart::update($request->id, $request->qty);

        $price = Cart::get($request->id);
        $count = Cart::count();
        $total = Cart::total();
        $subtotal = Cart::subtotal();


        return response()->json(['count' => $count, 'total' => $total, 'subtotal' => $subtotal, 'price'=>$price]);

    }

}
