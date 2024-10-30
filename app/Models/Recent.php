<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    protected $fillable = [
        'user_id',
        'city',
    ];
}
