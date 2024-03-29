<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
