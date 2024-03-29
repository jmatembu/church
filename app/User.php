<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasSlug;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
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

    public function clergy()
    {
        return $this->hasOne(Clergy::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function prayerRequests()
    {
        return $this->hasMany(PrayerRequest::class);
    }

    public function parish()
    {
        return $this->hasOne(Parish::class, 'id', 'current_parish');
    }

    public function scopeLaity($query)
    {
        return $query->whereCategory('Laity');
    }

    public function isCurrentParish(Parish $parish) : bool
    {
        return $parish->is($this->parish);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isParishAdministrator()
    {
        if ($this->current_parish) {
            return optional($this->parish->administrators)->contains($this->staff);
        }

        return false;
    }
}
