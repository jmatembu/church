<?php

namespace App;

use App\Traits\PresentsMedia;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Project extends Model implements HasMedia
{
    use HasSlug, HasMediaTrait, PresentsMedia;

    protected $guarded = [];

    protected $with = [
        'media'
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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('default')->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(160)
            ->height(160)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('featured')
            ->fit(Manipulations::FIT_CONTAIN, 800, 600)
            ->nonQueued();
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
