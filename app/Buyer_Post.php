<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer_Post extends Model
{
    public $table = 'buyer_post';

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
