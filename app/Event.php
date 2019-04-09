<?php

namespace App;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasSlug;

    protected $guarded = [];

    protected $dates = [
        'starts_at',
        'ends_at'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
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
     * Get all the owning eventable models
     */
    public function eventable()
    {
        return $this->morphTo();
    }

    public function getBriefDescriptionAttribute()
    {
        return strip_tags(Str::limit($this->description, 200));
    }

    public function getSnippetAttribute()
    {
        return Str::limit($this->brief_description);
    }
}
