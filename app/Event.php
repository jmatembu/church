<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = [
        'starts_at',
        'ends_at'
    ];
    
    /**
     * Get all the owning eventable models
     */
    public function eventable()
    {
        return $this->morphTo();
    }
}
