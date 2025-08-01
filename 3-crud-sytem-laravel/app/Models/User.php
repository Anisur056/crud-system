<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use this if you dont want to use created_at, update_at features
    //public $timestamps = false;

    protected $guarded = [];
}
