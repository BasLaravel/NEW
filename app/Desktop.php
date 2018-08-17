<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desktop extends Model
{
    use FullTextSearch;

    protected $guarded =[];

    protected $searchable = [
        'title',
        'short_description'
    ];
 
}
