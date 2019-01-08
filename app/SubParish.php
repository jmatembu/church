<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubParish extends Model
{
    /**
     * Get the owning parish of the sub parish
     */
    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    /**
     * Get all sub parish projects
     */
    public function projects()
    {
        return $this->morphMany('App\Project', 'projectable');
    }
}
