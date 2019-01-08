<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get all the owning postable models
     */
    public function postable()
    {
        return $this->morphTo();
    }
}
