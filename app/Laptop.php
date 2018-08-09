<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $guarded =[];
    // protected $appends=['screendiameter'];



    // public function getScreenDiameterAttribute() 
    // {
    //   $toExplode= $this->summary;
    //   $array = explode("|",$toExplode);
    //   return $array[1];
    // }



    
}
