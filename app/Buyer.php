<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;


class Buyer extends Model
{
    public $table = "buyer";


 public function User()
    {
        return $this->belongsTo('App\User');
    }

}
