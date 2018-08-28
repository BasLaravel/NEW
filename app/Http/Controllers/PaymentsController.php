<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;


class PaymentsController extends Controller
{

    public function preparePayment(){

        $cart = Cart::content();

        $total = str_replace(',','',Cart::subtotal());

        //dd($cart);

        $payment = \Mollie::api()->payments()->create([

            'amount' => [
                'currency' => 'EUR',
                'value' => $total,
            ],
        
            "description" => "My first API payment",
            
            "redirectUrl" => "http://bas.codeaap.nl/NEW/public/order/betaling/success",
        
            "webhookUrl" => "http://bas.codeaap.nl/NEW/public/webhooks/mollie",
        
            ]);
        
            $payment = \Mollie::api()->payments()->get($payment->id);
        
            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);
    }


   

        public function handle(Request $request) {

            dd('in handle');
            if (! $request->has('id')) {
                return;
            }

            foreach($cart as $item){
                Order::create([
                    'user_id' => auth()->id(),
                    'product_ean' => $item->options->product->ean
                ]);
            }
           
    
            $payment = mollie()->payments()->get($request->id);
    
            if($payment->isPaid()) {
                dd(' u heeft betaald');
            }
        }




        public function success(){

            return view('cart.after-payment');
        }



        




}
