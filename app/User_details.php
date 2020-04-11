<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    protected $table = 'users_details';
    protected $fillable = [
        'user_id', 'gender', 'alamat', 'imgprofile',
    ];
    public $timestamps = false;
}
