<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Desktop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesktopSearchController extends Controller
{
    public function search(Request $request)
    {
    
     $old=[];
    //$screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
    $processor = Desktop::select('processor')->distinct()->orderBy('processor','desc')->get();
    $merken = Desktop::select('specsTag')->distinct()->orderBy('specsTag')->get();

    if(!isset($request->brand)){
        $brands = $merken->toArray();
    }else{$brands=$request->brand; $old=$request->brand;}


    if(!isset($request->processor)){
        $pro_cessor = $processor->toArray();
    }else{$pro_cessor=$request->processor; $old=array_merge($pro_cessor, $old); }

  
    $desktops = Desktop::whereIn('specsTag',$brands)->where(function($query) use ($pro_cessor){

       foreach($pro_cessor as $pro){
            $query->Orwhere('processor','=',$pro);
        } })->orderBy('specsTag','asc')
        ->get();
    
    return view('product_categorien.desktops.index',[
        'desktops' => $desktops,
        'merken' => $merken,
        'processor' => $processor,
        'old'=> $old
        ]);
}
}
