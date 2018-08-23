<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Desktop;
use App\Monitor;

class SpecialOffersController extends Controller
{

    public function cacheOffers(){

        $offers=[];
        $i=0;
        $model = array("Laptop","Desktop","Monitor");

    foreach($model as $key => $value){
        $class = "App\\".$value;
        for($j=0; $j<2; $j++){
            $offers[$i] = $class::where('id',rand(1,97))->get(); 
            $i++;
        }
    }

    if(!\Cache::get('offers')){
           \Cache::set('offers', $offers, 1440); // 1440 = 24 hours in minutes
    }
 
    return \Cache::get('offers');

    }




    public function index(){
 
       $offer = $this->cacheOffers();

       //dd($offer);
       \View::share('key'.$offer[0][0]->ean, $offer[0][0]->price);
       \View::share('key'.$offer[1][0]->ean, $offer[1][0]->price);
       \View::share('key'.$offer[2][0]->ean, $offer[2][0]->price);
       \View::share('key'.$offer[3][0]->ean, $offer[3][0]->price);
       \View::share('key'.$offer[4][0]->ean, $offer[4][0]->price);
       \View::share('key'.$offer[5][0]->ean, $offer[5][0]->price);

       


       return view('offers.main-offers',[
           'offers' => $offer,
           ]);


    }
}
