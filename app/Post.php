<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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

    protected $guarded = [];

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
        return strip_tags(Str::limit($this->body, 150));
    }

    public function media($key, $default = null)
    {
        return Arr::get($this->media, $key, $default);
    }

    public function getFeaturedImageAttribute()
    {
        return $this->media('image');
    }

    public function hasFeaturedImage()
    {
        return ! empty($this->featured_image);
    }

    public function getBriefTitleAttribute()
    {
        return Str::limit($this->title);
    }
}
