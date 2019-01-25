<?php

namespace App;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class SubParish extends Model
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
