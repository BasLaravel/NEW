<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersExtendedInformation extends Model
{
    protected $guarded =[];
    //protected $dates = ['geboorte_datum'];


    public function user()
    {
        return $this->belongsTo('App\User');
        
    }

    public function thisAdres(){

        $adres =$this->straat_naam.' '.$this->huisnummer.'<br>'.$this->postcode.' '.$this->plaats_naam.'<br>'.$this->land; 
        return $adres;
    }

   




}
