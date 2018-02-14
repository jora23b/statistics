<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'page_id',
        'user_agent_id',
        'ip_id',
        'count',
        'date',
    ];

    public $timestamps = false;
}
