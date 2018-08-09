<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopSearchController extends Controller
{
    public function searchByBrand(Request $request )
    {

           // dd($request->merken);
        $laptops = Laptop::whereIn('specsTag',$request->merken)->orderBy('specsTag','asc')->get();
        $screendiameter = Laptop::select('screen_diameter')->distinct()->get();;
        $merken = Laptop::select('specsTag')->distinct()->get();

           
        return view('product_categorien.laptops.search',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter
            ]);
    }

    public function searchByScreenDiameter(Request $request )
    {
//dd($request->screendiameter);
        $laptopss = Laptop::whereIn('screen_diameter',$request->screendiameter)->get();
        $screendiameter = Laptop::select('screen_diameter')->distinct()->get();;
        $merken = Laptop::select('specsTag')->distinct()->get();
      dd($laptopss);
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter
        ]);
    }




}
