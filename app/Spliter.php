<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spliter extends Model
{
    protected $fillable=[
        'name',
        'code',
        'location',
        'input_fiber_core',
        'fiber_color',
        'number_of_port',
        'quarter',
        'signal_received',
        'installed_by',
        'status'
    ];
}
