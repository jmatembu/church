<?php


namespace App\Traits;


use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;

trait PresentsMedia
{
    public function getFeaturedImageAttribute()
    {
        return $this->getFirstMediaUrl('default', 'featured');
    }

    public function getFeaturedImageThumbAttribute()
    {
        return $this->getFirstMediaUrl('default', 'thumb');
    }
}
