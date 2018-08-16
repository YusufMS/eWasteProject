<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use seller;
use sub_waste_category;

class posts extends Model
{
    public $table = "post";

    public function User()
    {
        return $this->belongsTo('App\User','publisher_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\seller');
    }


    public function sub_waste_category()
    {
        return $this->belongsTo('App\sub_waste_category','sub_waste_category_id');
    }

}
