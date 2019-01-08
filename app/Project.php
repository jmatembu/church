<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Get all of the owning projectable models.
     */
    public function projectable()
    {
        return $this->morphTo();
    }
}
