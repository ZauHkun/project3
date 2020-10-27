<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
            'name',
            'phone',
            'address',
            'status',
            'map',
    ];
    public function installation(){
        return $this->hasMany('App\Installation');
    }
}
