<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diocese extends Model
{
    /**
     * Get all diocese parishes
     */
    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }

    /**
     * Get all diocese projects
     */
    public function projects()
    {
        return $this->morphMany('App\Project', 'projectable');
    }

    /**
     * Get all of the diocese categories
     */
    public function categories()
    {
        return $this->morphMany('App\Category', 'categorable');
    }
}
