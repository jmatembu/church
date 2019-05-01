<?php


namespace App\Traits;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait PresentsParish
{
    public function aboutPage()
    {
        if (! $this->pageCategory) {
            return null;
        }

        return $this->pageCategory->posts->first(function ($post) {
            return $post->isAboutParish();
        });
    }

    public function getAboutPageAttribute()
    {
        return $this->aboutPage();
    }

    public function settings($key, $default = null)
    {
        return Arr::get($this->settings, $key, $default);
    }

    public function getContactsAttribute()
    {
        return $this->settings('contacts', []);
    }

    public function getMainAddressAttribute()
    {
        return Arr::get($this->contacts, 'address');
    }

    public function getMainEmailAttribute()
    {
        return Arr::get($this->contacts, 'email');
    }

    public function getMainPhoneAttribute()
    {
        $phoneNumbers = Arr::get($this->contacts, 'phone');

        return $phoneNumbers[0];
    }

    public function getMapLocationAttribute()
    {
        return Arr::get($this->contacts, 'location', null);
    }

    public function getBannerHeadlineAttribute()
    {
        return $this->settings('banner.headline', 'God gives us Power');
    }

    public function getBannerDescriptionAttribute()
    {
        return $this->settings('banner.description');
    }

    public function getBannerBackgroundImagePathAttribute()
    {
        $defaultBgImagePath = 'assets/images/banner/3.jpg';

        return $this->settings('banner.background_image_path', $defaultBgImagePath);
    }

    public function hasBannerButton()
    {
        return ! empty($this->banner_button_text) && ! empty($this->banner_button_link);
    }

    public function getBannerButtonTextAttribute()
    {
        return $this->settings('banner.button_text', 'What\'s New');
    }

    public function getBannerButtonLinkAttribute()
    {
        return $this->settings('banner.button_link', route('parish.news.index', $this));
    }

    public function getQuotesAttribute()
    {
        return $this->settings('quotes', []);
    }

    public function getQuoteAttribute()
    {
        return Arr::random($this->quotes);
    }

    public function getQuoteTextAttribute()
    {
        return $this->quote['text'];
    }

    public function getQuoteAuthorAttribute()
    {
        return $this->quote['author'];
    }

    public function getQuoteIdAttribute()
    {
        return $this->quote['id'];
    }
    public function getMassScheduleAttribute()
    {
        return $this->settings('mass');
    }

    public function getMassScheduleNotesAttribute()
    {
        return $this->settings('mass.notes');
    }

    public function massOn($day)
    {
        return Arr::get($this->mass_schedule, $day);
    }

    public function getMassOnSundayAttribute()
    {
        return $this->massOn('sunday');
    }

    public function getMassOnMondayAttribute()
    {
        return $this->massOn('monday');
    }

    public function getMassOnTuesdayAttribute()
    {
        return $this->massOn('tuesday');
    }

    public function getMassOnWednesdayAttribute()
    {
        return $this->massOn('wednesday');
    }

    public function getMassOnThursdayAttribute()
    {
        return $this->massOn('thursday');
    }

    public function getMassOnFridayAttribute()
    {
        return $this->massOn('friday');
    }

    public function getMassOnSaturdayAttribute()
    {
        return $this->massOn('saturday');
    }

    public function getMetaDescriptionAttribute()
    {
        return Str::limit($this->description, 80);
    }
}
