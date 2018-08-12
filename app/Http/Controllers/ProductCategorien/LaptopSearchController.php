<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopSearchController extends Controller
{
    public function search(Request $request)
    {   
       
        //dd($request->old_price);
        $laptops = Laptop::all();
        $min=round($laptops->min('price'));
        $max=round($laptops->max('price'));
        $avg=round(($min+$max)/2);

        $old=[];
        $screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();

        if(!isset($request->brand)){
            $brands = $merken->toArray();
        }else{$brands=$request->brand; $old=$request->brand;}

        if(!isset($request->screendiameter)){
            $screen_diameter = $screendiameter->toArray();
        }else{$screen_diameter=$request->screendiameter; $old=array_merge($screen_diameter, $old); }

        if(!isset($request->processor)){
            $pro_cessor = $processor->toArray();
        }else{$pro_cessor=$request->processor; $old=array_merge($pro_cessor, $old); }

         if($request->price<$request->old_price-450){
            $price=array(($request->price-100),($request->price+100));
            $old['priced']=$request->price;
            $priced=$request->price;
        }else{
            $price=array($min,$max);
            $priced=0;
            if(isset($old['priced'])){
              unset($old['priced']);  
            }
        }
        

        $laptops = Laptop::whereIn('specsTag',$brands)->where(function($query) use ($screen_diameter){

            foreach($screen_diameter as $diameter){
                $query->Orwhere('screen_diameter','=',$diameter);
            }})->where(function($query) use ($pro_cessor){

           foreach($pro_cessor as $pro){
                $query->Orwhere('processor','=',$pro);
            }})->whereBetween('price',$price)->orderBy('specsTag','asc')->get();

          
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor,
            'old'=> $old,
            'min' => round($min),
            'max' => round($max),
            'avg' => round($avg),   
            'priced' => $priced
            ]);
    }


   

}
