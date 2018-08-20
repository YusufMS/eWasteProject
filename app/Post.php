<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use user;
use seller;
use sub_waste_category;

class post extends Model
{
    public $table = "post";

    public function user()
    {
        return $this->belongsTo('App\user','publisher_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\seller');
    }


    public function sub_waste_category()
    {
        return $this->belongsTo('App\sub_waste_category','sub_waste_category_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function buyer_post(){
        return $this->hasOne('App\Buyer_Post');
    }

    public function seller_post(){
        return $this->hasOne('App\Seller_Post');
    }

}
