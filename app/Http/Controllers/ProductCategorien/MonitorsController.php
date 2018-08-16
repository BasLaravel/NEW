<?php

namespace App\Http\Controllers\ProductCategorien;

use App\Monitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = Monitor::all()->sortBy('specsTag');
        $screendiameter = Monitor::select('screen_diameter')->whereNotNull('screen_diameter')->distinct()->orderBy('screen_diameter')->get();;
        $resolution = Monitor::select('resolution')->whereNotNull('resolution')->distinct()->orderBy('resolution','asc')->get();;
        $merken = Monitor::select('specsTag')->distinct()->orderBy('specsTag')->get();
      
        return view('product_categorien.monitors.index',[
            'monitors' => $monitors,
            'merken' => $merken,
            'screendiameter' => $screendiameter,
            'resolution' => $resolution
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
    public function show(Monitor $monitor)
    {
        return view('product_categorien.monitors.show',['monitor' => $monitor]);
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
