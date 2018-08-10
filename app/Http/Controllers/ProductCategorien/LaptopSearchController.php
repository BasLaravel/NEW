<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopSearchController extends Controller
{
    public function searchByBrand(Request $request )
    {

        $laptops = Laptop::whereIn('specsTag',$request->merken)->orderBy('specsTag','asc')->get();
        $screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();

        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor
            ]);
    }


    public function searchByScreenDiameter(Request $request )
    {

        $laptops = Laptop::whereIn('screen_diameter',$request->screendiameter)->get();
        $screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();
     
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor
        ]);
    }

    
    public function searchByProcessor(Request $request )
    {

        $laptops = Laptop::whereIn('processor',$request->processor)->get();
        $screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();;
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();
      
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor
        ]);
    }





}
