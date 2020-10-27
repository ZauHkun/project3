<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $fillable=[
        'name',
        'duration',
        'price',
        'status',
    ];
}
