<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use main_waste_category;


class sub_waste_category extends Model
{
    public $table = "sub_waste_category";


    public function posts(){
        return $this->hasMany('App\post');
    }


    public function main_waste_category()
    {
        return $this->belongsTo('App\main_waste_category','main_category_id');
    }


}
