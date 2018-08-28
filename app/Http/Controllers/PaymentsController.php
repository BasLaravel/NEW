<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function preparePayment(){

       
        $payment = mollie()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "My first API payment",
            'redirectUrl' => route('payment.success'),
            'webhookUrl'   => route('webhooks.mollie'),
            ]);

        // dd($payment);
        // return $payment;

            $payment = mollie()->payments()->get($payment->id);
            
        
            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);

    }


   

        public function handle(Request $request) {
            if (! $request->has('id')) {
                return;
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
