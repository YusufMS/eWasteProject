<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller_Post extends Model
{
    public $table = 'seller_post';

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
