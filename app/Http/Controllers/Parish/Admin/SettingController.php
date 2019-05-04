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

        if ($this->updateParishSettings($parish, $settings)) {
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

        if ($this->updateParishSettings($parish, $settings)) {
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

        $this->updateParishSettings($parish, $settings);

        return back()->with('success', 'Quote added successfully');
    }

    public function massSchedule(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'sunday' => 'required|string',
            'monday' => 'required|string',
            'tuesday' => 'required|string',
            'wednesday' => 'required|string',
            'thursday' => 'required|string',
            'friday' => 'required|string',
            'saturday' => 'required|string',
            'mass_schedule_notes' => 'nullable|string|max:1000',
        ]);

        $settings = $parish->settings;
        $schedule = $request->only(['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']);
        $schedule['notes'] = $request->mass_schedule_notes;
        $settings['mass'] = $schedule;

        $this->updateParishSettings($parish, $settings);

        return back()->with('success', 'Mass schedule updated successfully');
    }

    protected function updateParishSettings(Parish $parish, array $settings) {
        return $parish->update(['settings' => $settings]);
    }
}
