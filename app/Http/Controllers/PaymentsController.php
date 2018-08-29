<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\OrderItems;


class PaymentsController extends Controller
{

    public function preparePayment(){

      
        $order = Order::create([
            'user_id' => auth()->id(),
            'payment_id' =>  0,
            'payment_status' => 0,
        ]);

        $cart = Cart::content(); 

        foreach($cart as $item){
        OrderItems::create([
            'order_id' => $order->id,
            'product_id' =>  $item->options->product->product_id,
            'qty' => $item->qty,
            'price' => $item->price,
        ]);
        }

        $total = str_replace(',','',Cart::subtotal());

        $payment = \Mollie::api()->payments()->create([

            'amount' => [
                'currency' => 'EUR',
                'value' => $total,
            ],
        
            "description" => "My first API payment",
            
            "redirectUrl" => "http://bas.codeaap.nl/NEW/public/order/betaling/success?id=.$order->id",
        
            "webhookUrl" => route('mollie.webhook'),
        
            ]);
        
            $payment = \Mollie::api()->payments()->get($payment->id);

            $order->payment_id = $payment->id;
            $order->save();
        
            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);
    }



        public function handle(Request $request) {

            // $order = Order::where('payment_id', $request)->get();
            // $order->payment_status = 'paid';
            // $order->save;

            file_put_contents('webhook1.log',$request->all());

            if (! $request->has('id')) {
                file_put_contents('webhook2.log',$request->all());
                return;
            }

            $payment = mollie()->payments()->get($request->id);
    
            if($payment->isPaid()) {

                file_put_contents('webhook3.log',$request->all());

               

            }
        }



       
        


        public function success(Request $request){

            $order_id = Order::findOrFail($request->id);
           
            return view('cart.after-payment',[
                'order' => $order_id
            ]);
        }



        




}
