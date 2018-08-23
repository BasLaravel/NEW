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

    public function UserMadeReview()
    {
        return $this->reviews()->where('user_id', auth()->id())->count();
       
    }




  


    
}
