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

class Event extends Model implements HasMedia
{
    use HasSlug, HasMediaTrait, PresentsMedia;

    protected $guarded = [];

    protected $dates = [
        'starts_at',
        'ends_at'
    ];

    protected $dispatchesEvents = [
        'saved' => \App\Events\Parish\EventCreated::class,
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
