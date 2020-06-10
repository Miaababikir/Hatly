<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens;
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
