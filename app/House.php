<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment', 'house_id');
    }
}
