<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use App\User;
use App\Order;
use App\UsersExtendedInformation;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('account.account-page');
    }


    public function adres(){

        $information = UsersExtendedInformation::where('user_id', auth()->id())->get();
        if(!isset($information[0])){
            $information[0] = null;
        }

        //dd($information);

        return view('account.adres-gegevens',[
            'information' => $information[0],
        ]);
    }



    public function adresstore(Request $request){

        //dd($request);
        $this->validate(request(),[
            'user_id'=> 'numeric',
            'aanhef'=> 'required|in:dhr,mevr',
            'voor_naam'=> 'required|string|min:2|max:20',
            'tussenvoegsel'=> 'nullable|string|min:1|max:10',
            'achter_naam'=> 'required|string|min:2|max:60',
            'straat_naam'=> 'required|string|min:2|max:70',
            'huisnummer'=> 'required|string|min:0|max:10',
            'postcode'=> 'required|string|min:6|max:7',
            'plaats_naam'=> 'required|string|min:2|max:70',
            'land'=> 'required|string|min:2|max:70', 
            'geboorte_datum'=> 'nullable',
            'telefoonnummer'  => 'required|string|min:8|max:12',
        ]);


        $c = array(" ","-");
        

        UsersExtendedInformation::updateOrCreate([
            'user_id' => auth()->id(),
        ],[
            'aanhef' => $request->aanhef,
            'voor_naam' => $request->voor_naam,
            'tussenvoegsel' => $request->tussenvoegsel,
            'achter_naam' => $request->achter_naam,
            'straat_naam' => $request->straat_naam,
            'huisnummer' => $request->huisnummer,
            'postcode' => str_replace($c,"",$request->postcode),
            'plaats_naam' => $request->plaats_naam,
            'land' => $request->land,
            'geboorte_datum' => $request->geboorte_datum,
            'telefoonnummer' => $request->telefoonnummer,
            ]);

            session()->flash('message', 'Dank u! Uw gegevens zijn succesvol ontvangen.');
           
            return back();

    }

    
    public function inlog(){


        $email = User::where('id', auth()->id())->get();

        return view('account.inlog-gegevens',[
            'inlog' => $email[0],
        ]);
    }


    public function inlogstore(Request $request, User $user){

       
        $this->validate(request(),[
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

            if(isset($request->password)){

                $this->validate(request(),[
                    'password' => 'string|min:6|confirmed',
                ]);

                $password =bcrypt($request->password);
                $user->update(['password' => $password]);
            }
       

        $user->update(request(['email']));

        session()->flash('message', 'Uw Inloggegevens zijn succesvol geupdate');
     
        return back();

    }


    public function newBevestigingsMail(){
      
        $user = auth()->user();
       

        Mail::to($user->email)->send(new \App\Mail\PleaseConfirmYourEmail($user));

        session()->flash('message', 'Er is een nieuwe email verstuurd');

        return back();
    }


    public function orderIndex(){

        $orders = Order::all()->where('user_id',auth()->id())->sortByDesc('created_at');

        $product_array=[];
        $i=0;
       
        foreach($orders as $order){
            foreach($order->orderItems as $item){

                $models = array("Laptop","Desktop","Monitor");
        
                foreach($models as $key => $value){
                    $class = "\\App\\".$value;
                    $product = $class::where('product_id',$item->product_id)->get()->toArray();
                        if(!empty($product)){
                            $product_array[$i] = $product;
                            $i++;
                            continue;
                        }
                }
                
            }   
        }

//dd($product_array);

        return view('account.orders',[
            'orders' => $product_array,
        ]);


    }


}
