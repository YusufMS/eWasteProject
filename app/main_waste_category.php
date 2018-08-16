<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use sub_waste_category;

class main_waste_category extends Model
{
    public $table = "main_waste_category";

    public function sub_waste_category()
    {
        return $this->hasMany('App\sub_waste_category','main_category_id');
    }

}
