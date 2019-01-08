<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Get all the owning eventable models
     */
    public function eventable()
    {
        return $this->morphTo();
    }
}
