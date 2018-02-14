<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $fillable = ['user_agent'];

    public $timestamps = false;
}
