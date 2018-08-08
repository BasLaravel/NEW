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
        $merken = Laptop::select('specsTag')->distinct()->get();

           
     

        return view('product_categorien.laptops.search',[
            'laptops' => $laptops,
            'merken' => $merken
            ]);
    }



    // $query = DB::table('users')->select('name');

    // $users = $query->addSelect('age')->get();

}
