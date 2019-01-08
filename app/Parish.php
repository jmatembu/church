<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    /**
     * Get the owning diocese of the parish
     */
    public function diocese()
    {
        return $this->belongsTo(Diocese::class);
    }

    /**
     * Get all of the parish sub parishes
     */
    public function subParishes()
    {
        return $this->hasMany(SubParish::class);
    }

    /**
     * Get all of the parish staff
     */
    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    /**
     * Get all of the parish events
     */
    public function events()
    {
        return $this->morphMany('App\Event', 'eventable');
    }

    /**
     * Get all of the parish projects
     */
    public function projects()
    {
        return $this->morphMany('App\Project', 'projectable');
    }

    /**
     * Get all of the parish posts
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }

    /**
     * Get all of the parish categories
     */
    public function categories()
    {
        return $this->morphMany('App\Category', 'categorable');
    }
}
