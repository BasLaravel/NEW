<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','confirmation_token','confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $cast = ['confirmed'=> 'boolean'];



    public function adres()
    {
        return $this->hasOne('App\UsersExtendedInformation');
    }
    

    public function bestellingen()
    {
        return $this->hasMany('App\Order');
       
    }



}
