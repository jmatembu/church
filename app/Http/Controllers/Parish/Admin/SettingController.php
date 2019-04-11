<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Http\Requests\Parish\UpdateBannerRequest;
use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function index(Parish $parish)
    {
        return view('parish.admin.settings.index');
    }

    public function contacts(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'contact_address' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|max:15',
            'contact_location' => 'nullable|string',
        ]);

        $settings = $parish->settings;
        Arr::set($settings, 'contacts.address', $request->contact_address);
        Arr::set($settings, 'contacts.email', $request->contact_email);
        Arr::set($settings, 'contacts.phone', [$request->contact_phone]);
        Arr::set($settings, 'contacts.location', $request->contact_location);

        if ($parish->update(['settings' => $settings])) {
            return back()->with('success', 'Settings updated successfully');
        }

        return back()->with('error', 'Something went wrong, settings not updated.');

    }

    public function banner(UpdateBannerRequest $request, Parish $parish)
    {
        $settings = $parish->settings;

        Arr::set($settings, 'banner.headline', $request->banner_headline);
        Arr::set($settings, 'banner.description', $request->banner_description);
        Arr::set($settings, 'banner.button_text', $request->banner_button_text);
        Arr::set($settings, 'banner.button_link', $request->banner_button_link);

        if ($request->hasFile('banner_background_image_path')) {

            $parishBannerBgImagePath = 'bg_banner.' . $request->file('banner_background_image_path')->getClientOriginalExtension();
            $parishAssetDirectory = 'public/parishes/' . $parish->slug . '/images';
            $filePath = $request->file('banner_background_image_path')->storeAs($parishAssetDirectory, $parishBannerBgImagePath);

            Arr::set($settings, 'banner.background_image_path', Str::after($filePath, 'public/'));
        }


        if ($parish->update(['settings' => $settings])) {
            return back()->with('success', 'Settings updated successfully');
        }

        return back()->with('error', 'Something went wrong, settings not updated.');
    }

    public function parishUpdate(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'description' => 'required|string|max:1000',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:500',
        ]);

        $record = $request->only(['description']);

        if ($request->hasFile('logo')) {
            $fileName = 'logo.' . $request->file('logo')->getClientOriginalExtension();
            $postDirectory = 'parishes/' . $parish->slug . '/images';
            $record['logo'] = $request->file('logo')->storeAs($postDirectory, $fileName, 'public');
        }

        $parish->fill($record)->save();

        return back()->with('success', 'Parish updated successfully');
    }

    public function updateQuote(Request $request, Parish $parish)
    {
        $settings = $parish->settings;
        $settings['quotes'][] = [
            'id' => now()->timestamp,
            'text' => $request->quote_text,
            'author' => $request->quote_author
        ];

        $parish->update(['settings' => $settings]);

        return back()->with('success', 'Quote added successfully');
    }
}
