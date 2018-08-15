<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use main_waste_category;


class waste extends Model
{
    public $table = "waste";


    public function posts(){
        return $this->hasMany('App\posts');
    }


    public function main_waste_category()
    {
        return $this->belongsTo('App\main_waste_category','main_category_id');
    }


}
