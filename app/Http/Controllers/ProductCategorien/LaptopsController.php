<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptops = Laptop::all()->sortBy('specsTag');
        $min=$laptops->min('price');
        $max=$laptops->max('price');
        $avg=round(($min+$max)/2);
        $screendiameter = Laptop::select('screen_diameter')->whereNotNull('screen_diameter')->distinct()->orderBy('screen_diameter')->get();;
        $processor = Laptop::select('processor')->distinct()->orderBy('processor','desc')->get();;
        $merken = Laptop::select('specsTag')->distinct()->orderBy('specsTag')->get();
        $priced=0;
      
        return view('product_categorien.laptops.index',[
            'laptops' => $laptops,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'processor' => $processor,
            'min' => round($min),
            'max' => round($max),
            'avg' => round($avg),
            'priced' => $priced   
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {

        return view('product_categorien.laptops.show',['laptop' => $laptop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
