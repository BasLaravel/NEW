<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterConfirmationController extends Controller
{
     public function index(){
        try{
            User::where('confirmation_token', request('token'))
                ->firstOrFail()
                ->update(['confirmed' => 1,
                          'confirmation_token' => NULL
                ]);
                
        }catch(\Exception $e){
    
            session()->flash('message', 'token niet herkend');
            return redirect()->route('home');
        }
       
    
            session()->flash('message', 'Uw account is geactiveerd');
            return redirect()->route('home');
        }
    
}
