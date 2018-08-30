<?php

namespace App\Http\Controllers\API;

use App\Laptop;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaptopsController extends Controller
{
    /**Being used to get new product categories after it works. The code will be saved in a seeder::CLASS;
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feed()
    {
        //Cache::forget('monitoren');
//dd(Cache::get('monitoren'));
        if (Cache::has('monitor')) {

            echo "<p>De laptopsCollectie staat in de Cache</p>";
            $data = Cache::get('monitor');
            dd($data['products'][0]);
            //dd($data['products'][88]['offerData']['offers'][0]['price']);

        }else{

            try{
                //$apiUrl = 'https://api.bol.com/catalog/v4/lists/?ids=10460&limit=100&apikey=A1588DB3C75F426196E5C3A7A64887A9&MediaEntry=true&includeAttributes=true&format=json';  
            
                $data = json_decode(file_get_contents($apiUrl), true);
            
                $moni = Cache::forever('monitor', $data);
            
                echo "<p>De gegevens ontvangen van de API (laptops.bol.com) en zijn in de cache gezet.</p>";
                dd($moni);
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
        $arrLength = count($data['products']);


        for ($i = 0; $i < $arrLength; $i++) {

            $toExplode = $data['products'][$i]['summary'];
            $array = explode("|",$toExplode);
            $screendiameter = trim($array[1]," ");
            $processor = trim($array[0], " ");

            Laptop::create([
            'product_id' => $data['products'][$i]['id'],
            'ean' => $data['products'][$i]['ean'],
            'title'=> $data['products'][$i]['title'],
            'specsTag' => $data['products'][$i]['specsTag'],
            'processor' => (isset($processor))? $processor : null,
            'screen_diameter'=> (isset($screendiameter))? $screendiameter : null,
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
