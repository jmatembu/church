<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = [
        'start_publishing_at',
        'stop_publishing_at'
    ];

    protected $casts = [
        'media' => 'array'
    ];
    /**
     * Get all the owning postable models
     */
    public function postable()
    {
        return $this->morphTo();
    }
}
