<?php

namespace App\Http\Controllers\API;

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
    public function feed()
    {
        $rUrl = 'https://api.bol.com/catalog/v4/lists/?ids=4770&limit=100&apikey=A1588DB3C75F426196E5C3A7A64887A9&MediaEntry=true&includeAttributes=true&format=json';
        
        //$rUrl = 'https://api.bol.com/catalog/v4/products/9200000078934448?apikey=A1588DB3C75F426196E5C3A7A64887A9&offers=cheapest&includeAttributes=true&format=json';

       $data = json_decode(file_get_contents($rUrl), true);

       //dd($data);
    $this->databasefeeder($data);


    
}
        

    public function databasefeeder($data){ 

        for ($i = 0; $i <= 99; $i++) {

            Laptop::create([
            'product_id' => $data['products'][$i]['id'],
            'ean' => $data['products'][$i]['ean'],
            'title'=> $data['products'][$i]['title'],
            'specsTag' => $data['products'][$i]['specsTag'],
            'summary'=> $data['products'][$i]['summary'],
            'short_description'=> $data['products'][$i]['shortDescription'],
            'long_description'=> $data['products'][$i]['longDescription'],
            'image_large'=> $data['products'][$i]['images'][5]['url'],
            'image_1'=> $data['products'][$i]['media'][0]['url'],
            'image_2'=> $data['products'][$i]['media'][1]['url'],
            'image_3'=> $data['products'][$i]['media'][2]['url'],
            ]);
        } 




        
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
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptop $laptop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptop $laptop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptop $laptop)
    {
        //
    }
}
