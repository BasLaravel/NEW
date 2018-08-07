<?php

namespace App\Http\Controllers\API;

use App\Laptop;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
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


        if (Cache::has('laptops')) {

            echo "<p>De laptopsCollectie staat in de Cache</p>";
            $data = Cache::get('laptops');
            //dd($data);

        }else{

            try{
                $apiUrl = 'https://api.bol.com/catalog/v4/lists/?ids=4770&limit=100&apikey=A1588DB3C75F426196E5C3A7A64887A9&MediaEntry=true&includeAttributes=true&format=json';  
            
                $data = json_decode(file_get_contents($apiUrl), true);
            
                $laptops = Cache::forever('laptops', $data);
            
                echo "<p>De gegevens ontvangen van de API (laptops.bol.com) en zijn in de cache gezet.</p>";

               } catch(\Exception $e){
                    return $e->getMessage();
               }
        }

        if(Laptop::count() > 0){

            echo "<p>Er staan minstens 1 rij in webshop.laptops. Om de gegevens vanuit de cache in te laden in de db. Maak de db leeg.</p>";
        
        }else{

            $this->databasefeeder();
            echo "<p>de key laptops in de cache zijn geladen in webshop.laptops</p>";
        }


    }
        

    public function databasefeeder(){ 

        $data = Cache::get('laptops');
       
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
            'image_1'=> (isset($data['products'][$i]['media'][0]))? $data['products'][$i]['media'][0]['url'] : null,
            'image_2'=> (isset($data['products'][$i]['media'][1]))? $data['products'][$i]['media'][1]['url'] : null,
            'image_3'=> (isset($data['products'][$i]['media'][2]))? $data['products'][$i]['media'][2]['url'] : null,
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
