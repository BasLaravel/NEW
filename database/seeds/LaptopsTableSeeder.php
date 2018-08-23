<?php

use Illuminate\Database\Seeder;
use App\Laptop;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //Cache::forget('laptops');

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
            echo "<p>de key laptops in de cache is geladen in de database</p>";
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
            'categorie' => 'laptops',
            'ean' => $data['products'][$i]['ean'],
            'title'=> $data['products'][$i]['title'],
            'price' => $data['products'][$i]['offerData']['offers'][0]['price'],
            'korting' => 0,
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
}
