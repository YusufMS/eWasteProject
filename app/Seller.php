<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $table = 'seller';

    public function post()
    {
        return $this->hasMany('App\post');
    }

}
