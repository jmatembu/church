<?php


namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait PresentsPost
{
    public function getBriefTitleAttribute()
    {
        return Str::limit($this->title);
    }

    public function getBriefNewsTitleAttribute()
    {
        return Str::limit($this->title, 50);
    }

    public function getSnippetAttribute()
    {
        return strip_tags(Str::limit($this->body, 150));
    }

    public function getBriefSnippetAttribute()
    {
        return Str::limit($this->snippet, 100);
    }

    public function getBriefNewsSnippetAttribute()
    {
        return Str::limit($this->snippet, 50);
    }

    public function isAboutParish()
    {
        return Str::contains($this->slug, 'about-the-parish');
    }

    public function getPublishedAtAttribute()
    {
        return $this->start_publishing_at->format('M d, Y');
    }
}
