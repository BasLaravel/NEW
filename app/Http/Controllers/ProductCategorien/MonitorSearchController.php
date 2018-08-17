<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Monitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitorSearchController extends Controller
{
    public function search(Request $request)
    {
        //dd($request->processor);

        $old=[];
        $screendiameter = Monitor::select('screen_diameter')->whereNotNull('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
        $resolution = Monitor::select('resolution')->whereNotNull('resolution')->distinct()->orderBy('resolution','asc')->get();
        $merken = Monitor::select('specsTag')->distinct()->orderBy('specsTag')->get();

        if(!isset($request->brand)){
            $brands = $merken->toArray();
        }else{$brands=$request->brand; $old=$request->brand;}

        if(!isset($request->screendiameter)){
            $screen_diameter = $screendiameter->toArray();
        }else{$screen_diameter=$request->screendiameter; $old=array_merge($screen_diameter, $old); }

        if(!isset($request->resolution)){
            $re_solution = $resolution->toArray();
        }else{$re_solution=$request->resolution; $old=array_merge($re_solution, $old); }

      
        $monitors = Monitor::whereIn('specsTag',$brands)->where(function($query) use ($screen_diameter){

            foreach($screen_diameter as $diameter){
                $query->Orwhere('screen_diameter','=',$diameter);
            }})->where(function($query) use ($re_solution){

           foreach($re_solution as $resolution){
                $query->Orwhere('resolution','=',$resolution);
            } })->orderBy('specsTag','asc')->get();
        
        return view('product_categorien.monitors.index',[
            'monitors' => $monitors,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'resolution' => $resolution,
            'old'=> $old
            ]);
    }
}
