<?php

namespace App;

use App\FullTextSearch;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use FullTextSearch;

    protected $guarded =[];

    protected $searchable = [
        'title',
        'short_description'
    ];


    public function reviews()
    {
        return $this->hasMany('App\LaptopReview');
       
    }

 
    // protected $appends=['screendiameter'];



    // public function getScreenDiameterAttribute() 
    // {
    //   $toExplode= $this->summary;
    //   $array = explode("|",$toExplode);
    //   return $array[1];
    // }



    
}
