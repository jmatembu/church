<?php

namespace App;

use App\Traits\PresentsMedia;
use App\Traits\PresentsPost;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Post extends Model implements HasMedia
{
    use HasSlug,
        HasMediaTrait,
        PresentsPost,
        PresentsMedia;
    
    protected $dates = [
        'start_publishing_at',
        'stop_publishing_at'
    ];

    protected $guarded = [];

    protected $with = [
        'media'
    ];

    protected $dispatchesEvents = [
        'saved' => \App\Events\Parish\PostSaved::class,
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

    public function newsCategory()
    {
        return $this->belongsTo(Category::class)->where('name', '=', 'News');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault(['full_name' => 'Admin']);
    }
}
