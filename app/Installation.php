<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    protected $fillable=[
        'date',
        'customer_id',
        'spliter_id',
        'plan_id',
        'cable_length',
        'installed_by',
        'remark'
    ];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function spliter(){
        return $this->belongsTo('App\Spliter');
    }
    public function plan(){
        return $this->belongsTo('App\PaymentPlan');
    }
}
