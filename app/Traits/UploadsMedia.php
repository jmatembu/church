<?php


namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadsMedia
{
    public function upload($model, $inputName = 'featured_image')
    {
        $request = Request::capture();

        if (! $request->hasFile($inputName)) {
            return false;
        }

        $featuredImageFileName = Str::kebab(now()->timestamp . "-{$inputName}.")
            . $request->file($inputName)
                ->getClientOriginalExtension();

        $model->addMediaFromRequest($inputName)
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
