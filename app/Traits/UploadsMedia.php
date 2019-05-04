<?php


namespace App\Traits;


use Illuminate\Http\Request;

trait UploadsMedia
{
    public function upload($model)
    {
        $request = Request::capture();

        if (! $request->hasFile('featured_image')) {
            return false;
        }

        $featuredImageFileName = now()->timestamp
            . '-featured-image.'
            . $request->file('featured_image')
                ->getClientOriginalExtension();

        $model->addMediaFromRequest('featured_image')
            ->usingFileName($featuredImageFileName)
            ->toMediaCollection();

        /**
         * We are uploading an image when the model is created for the first time
         * or updated. When it is being updated, we want to remove the existing
         * featured image.
         */
        $images = $model->getMedia();

        if ($images->count() > 1) {
            $images->first()->delete();
        }

        return true;
    }
}
