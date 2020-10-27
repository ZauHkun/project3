<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=[
        'car_name',
        'brand_id',
        'company',
        'price',
        'model',
        'color',
        'description',
        'img',
        'is_sold',
        'action_by',
    ];


    public function brand(){
        return $this->belongsTo('App\Brand');
    }
}
