<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    //
    protected $fillable = [
        'name', 'url', 'method' ,'param','response',
    ];
}
