<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password','phone'
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//          'user_type','remember_token',
//    ];


    public function seller()
    {
        return $this->belongsTo('App\seller');
    }

    public function messages()
{
        return $this->hasMany(Message::class);
}

    public function posts()
    {
        return $this->hasMany('App\posts');
    }


}
