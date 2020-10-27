<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title','content','slug','user_id','cat_id','img'
    ];

    public function comments(){
        return $this->morphMany('App\Comment','commendable');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
