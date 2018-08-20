<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;


class Buyer extends Model
{
    public $table = "buyer";


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
