<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Parish;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserSettingsRequest;

class SettingController extends Controller
{
    public function index()
    {
        $parishes = Parish::all();

        $parishesByDiocese = $parishes->groupBy(function ($parish) {
            return $parish->diocese->name;
        });

        return view('accounts.settings', compact('parishesByDiocese'));
    }

    public function update(UpdateUserSettingsRequest $request)
    {
        $request->user()->fill([
            'current_parish' => $request->default_parish
        ])->save();

        return redirect()->route('users.settings.index')->with('success', 'Settings updated successfully');
    }
}
