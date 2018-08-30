<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use App\Desktop;
use App\Monitor;

class SpecialOffersController extends Controller
{

    public function index(){
 
       $offers = $this->cacheOffers();
       $populairProducts = $this->getPopulairProducts();

       return view('offers.main-offers',[
           'offers' => $offers,
           'populairProducts' => $populairProducts,
           ]);
    }

    public function cacheOffers(){
        //\Cache::forget('offers');

    if(!\Cache::get('offers')){

    $model = array("Laptop","Desktop","Monitor");

        //zet korting weer op false\
        foreach($model as $key => $value){
            $class = "App\\".$value;
            $all = $class::all(); 
                for($h=0; $h<$all->count(); $h++){
                    if($all[$h]->korting == true){
                        $all[$h]->price = round(1/0.9*$all[$h]->price);
                        $all[$h]->korting = false;
                        $all[$h]->save();
                    }
                }
        }
        //selecter 6 random producten en zet korting op true en update prijs 10% korting
        $offers=[];
        $i=0;
        foreach($model as $key => $value){
            $class = "App\\".$value;
            for($j=0; $j<2; $j++){
                $offers[$i] = $class::where('id',rand(1,97))->get(); 
                $offers[$i][0]->update(['korting' => true]);
                $offers[$i][0]->update(['price' => round($offers[$i][0]->price*0.9)]);
                $i++;
            }
        }

           \Cache::set('offers', $offers, 1440); // 1440 = 24 hours in minutes

    }
 
    return \Cache::get('offers');

    }



    public function getPopulairProducts(){
        $array=[];
        $model = array("Laptop","Desktop","Monitor");

        foreach($model as $key => $value){
            $class = "App\\".$value;
            $all = $class::where('aantal_views','>','0')->orderBy('aantal_views','desc')->limit(2)->get()->toArray(); 
            $array=array_merge($array , $all);
        }

        $array = collect($array)->sortByDesc('aantal_views')->take(5);
         return $array;
    }

}
