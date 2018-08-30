<?php

namespace App\Http\Controllers\ProductCategorien;

use Illuminate\Http\Request;
use App\Desktop;
use App\Http\Controllers\Controller;

class DesktopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desktops = Desktop::all()->sortBy('specsTag');
        //$screendiameter = Laptop::select('screen_diameter')->distinct()->orderBy('screen_diameter')->get();;
        $processor = Desktop::select('processor')->distinct()->orderBy('processor','desc')->get();;
        $merken = Desktop::select('specsTag')->distinct()->orderBy('specsTag')->get();
      
        return view('product_categorien.desktops.index',[
            'desktops' => $desktops,
            'merken' => $merken,
            //'screendiameter' => $screendiameter,
            'processor' => $processor
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
    public function show(Desktop $desktop)
    {
        $desktop->increment('aantal_views');
        return view('product_categorien.desktops.show',['desktop' => $desktop]);
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
