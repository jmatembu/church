<?php

namespace App;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Diocese extends Model
{
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
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
