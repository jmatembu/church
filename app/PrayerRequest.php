<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrayerRequest extends Model
{
    protected $guarded = [];
    protected $dates = [
        'publish_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
