<?php

namespace App;

use App\Traits\PresentsParish;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Parish extends Model implements HasMedia
{
    use HasSlug, PresentsParish, HasMediaTrait;

    protected $casts = [
        'settings' => 'array'
    ];

    protected $guarded = [];

    protected $with = [
        'media',
    ];

    protected $dispatchesEvents = [
        'saved' => \App\Events\Parish\ParishSaved::class,
    ];

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

        $this->addMediaConversion('banner')
            ->fit(Manipulations::FIT_CONTAIN, 1900, 1000)
            ->nonQueued();
    }
    
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

    public function clergies()
    {
        return $this->belongsToMany(Clergy::class, 'clergy_parish', 'clergy_id', 'parish_id')
                    ->withPivot(['role'])
                    ->withTimestamps();
    }

    /**
     * Get all of the parish events
     */
    public function events()
    {
        return $this->morphMany('App\Event', 'eventable')->latest();
    }

    /**
     * Get all of the parish projects
     */
    public function projects()
    {
        return $this->morphMany('App\Project', 'projectable')->latest();
    }

    /**
     * Get all of the parish posts
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }

    public function prayerRequests()
    {
        return $this->hasMany(PrayerRequest::class)->latest();
    }

    public function administrators()
    {
        return $this->staffs->filter(function ($staff) {
            return strtolower($staff->role) === 'administrator';
        });
    }

    public function getAdministratorsAttribute()
    {
        return $this->administrators();
    }

    /**
     * Get all parish news
     *
     * @return \Illuminate\Support\Collection
     */

    public function news()
    {
        //return $this->morphMany('App\Post', 'postable')->joinWhere('categories', 'categories.categorable_id', '=', $this->id)->having('categories.name', '=', 'News')->get();
        return $this->posts->filter(function ($post) {
            return strtolower($post->category->name) === 'news';
        })->sortByDesc('created_at')->values();
    }

    public function getNewsAttribute()
    {
        return $this->news();
    }

    public function getLatestAsideNewsAttribute()
    {
        return $this->news()->take(3);
    }

    public function getLatestAsideEventsAttribute()
    {
        return $this->events->take(3);
    }

    public function pages()
    {
        return $this->posts->filter(function ($post) {
            return strtolower($post->category->name) === 'pages';
        })->sortByDesc('created_at')->values();
    }

    public function getPagesAttribute()
    {
        return $this->pages();
    }

    /**
     * Get all parish homilies
     *
     * @return \Illuminate\Support\Collection
     */
    public function homilies()
    {
        return $this->posts->filter(function ($post) {
            return $post->category->name == 'Homilies';
        });
    }

    public function getHomiliesAttribute()
    {
        return $this->homilies();
    }

    /**
     * Get all of the parish categories
     */
    public function categories()
    {
        return $this->morphMany('App\Category', 'categorable');
    }

    public function newsCategory()
    {
        return $this->hasOne(Category::class, 'categorable_id')->whereIn('name', ['news', 'News', 'NEWS']);
    }

    public function pageCategory()
    {
        return $this->hasOne(Category::class, 'categorable_id')->whereIn('name', ['pages', 'Pages', 'PAGES']);
    }

    public function laity()
    {
        return $this->hasMany(User::class, 'current_parish')->whereCategory('Laity');
    }
}
