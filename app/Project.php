<?php

namespace App;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasSlug;

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
     * Get all of the owning projectable models.
     */
    public function projectable()
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

    public function getFormattedBudgetAttribute()
    {
        return number_format($this->budget);
    }
}
