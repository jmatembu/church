<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clergy extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diocese()
    {
        return $this->hasOne(Diocese::class);
    }
}
