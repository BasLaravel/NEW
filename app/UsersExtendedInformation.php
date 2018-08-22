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




}
