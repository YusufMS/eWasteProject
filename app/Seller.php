<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use User;
use Post;

class Seller extends Model
{
    public $table = 'seller';

    public function post()
    {
        return $this->hasMany('App\post');
    }


    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
