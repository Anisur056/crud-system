<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use this if you dont want to use created_at, update_at features
    //public $timestamps = false;

    protected $guarded = [];



    protected function casts(): array
    {
        return[
            'password' => 'hashed',
        ];
    }
}
