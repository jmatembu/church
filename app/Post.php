<?php

namespace App;

use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Post extends Model
{
    use HasSlug;
    
    protected $dates = [
        'start_publishing_at',
        'stop_publishing_at'
    ];

    protected $casts = [
        'media' => 'array'
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
     * Get all the owning postable models
     */
    public function postable()
    {
        return $this->morphTo();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSnippetAttribute()
    {
        return strip_tags(str_limit($this->body, 150));
    }
}
