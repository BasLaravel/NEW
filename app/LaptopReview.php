<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaptopReview extends Model
{
    protected $guarded =[];


    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }

    
    public function laptop()
    {
        return $this->belongsTo('App\Laptop');
        
    }
}
