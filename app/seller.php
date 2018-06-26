<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $table = 'seller';

    public function posts()
    {
        return $this->belongsTo('App\posts');
    }

}
