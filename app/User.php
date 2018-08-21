<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Buyer;
use Seller;
use Complain;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password','phone'
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//          'user_type','remember_token',
//    ];


    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

     public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function post()
    {
        return $this->hasMany('App\post');

        
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function complains()
    {
        return $this->hasMany('App\Complain');

        
    }


}
