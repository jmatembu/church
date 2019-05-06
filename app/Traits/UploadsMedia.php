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

        return true;
    }
}
