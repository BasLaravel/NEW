<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Desktop;
use App\Monitor;

class SpecialOffersController extends Controller
{

    public function cacheOffers(){
        \Cache::forget('offers');


    if(!\Cache::get('offers')){

    $model = array("Laptop","Desktop","Monitor");

        //zet korting weer op false\
        foreach($model as $key => $value){
            $class = "App\\".$value;
            $all = $class::all(); 
                for($h=0; $h<$all->count(); $h++){
                    $all[$h]->korting = false;
                    $all[$h]->save();
                }
        }
        //selecter 6 random producten en zet korting op true
        $offers=[];
        $i=0;
        foreach($model as $key => $value){
            $class = "App\\".$value;
            for($j=0; $j<2; $j++){
                $offers[$i] = $class::where('id',rand(1,97))->get(); 
                $offers[$i][0]->update(['korting' => true]);
                $i++;
            }
        }

           \Cache::set('offers', $offers, 5); // 1440 = 24 hours in minutes

    }
 
    return \Cache::get('offers');

    }




    public function index(){
 
       $offers = $this->cacheOffers();

       //dd($offer);
       //\View::share('key'.$offer[0][0]->ean, $offer[0][0]->price);
    

       


       return view('offers.main-offers',[
           'offers' => $offers,
           ]);


    }
}
