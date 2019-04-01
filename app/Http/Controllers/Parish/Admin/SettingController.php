<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

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
            'contact_phone' => 'required|max:15'
        ]);

        $settings = $parish->settings;
        Arr::set($settings, 'contacts.address', $request->contact_address);
        Arr::set($settings, 'contacts.email', $request->contact_email);
        Arr::set($settings, 'contacts.phone', [$request->contact_phone]);

        if ($parish->update(['settings' => $settings])) {
            return back()->with('success', 'Settings updated successfully');
        }

        return back()->with('error', 'Something went wrong, settings not updated.');

    }
}
