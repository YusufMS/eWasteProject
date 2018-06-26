<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use seller;

class posts extends Model
{
    public $table = "post";

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function seller()
    {
        return $this->belongsTo('App\seller');
    }

}
