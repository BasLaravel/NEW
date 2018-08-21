<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaptopReview extends Model
{
    protected $guarded =[];
    protected $casts = ['aanrader' => 'boolean'];
    protected $appends=['GemiddeldeCijfer'];


    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }

    
    public function laptop()
    {
        return $this->belongsTo('App\Laptop');
        
    }

    // public function hasReview(){
    //     return $this->where('user_id', auth()->id())->count();
    // }


  
  //-------------------------------Attributen--------------------------------------------
    
  public function getGemiddeldeCijferAttribute() 
  {
      return (($this->bedieningsgemak+ $this->gebruiksvriendelijkheid +$this->snelheid + $this->mogelijkheid)*2)/4;

  }







}
