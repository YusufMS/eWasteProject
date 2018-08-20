<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    public $table = "buyer";


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
