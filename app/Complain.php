<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Post;
use User;

class Complain extends Model
{
    public $table = "complains";



public function post()
    {
        return $this->belongsTo('App\Post');
        
    }

public function user()
    {
        return $this->belongsTo('App\User', 'reporter_id');
        
    }


}
