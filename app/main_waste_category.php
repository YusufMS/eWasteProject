<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use waste;

class main_waste_category extends Model
{
    public $table = "main_waste_category";

    public function waste()
    {
        return $this->hasMany('App\waste','id');
    }

}
