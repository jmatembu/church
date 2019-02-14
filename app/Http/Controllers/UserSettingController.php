<?php

namespace App\Http\Controllers;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserSettingsRequest;

class UserSettingController extends Controller
{
    public function index()
    {
        $parishes = Parish::all();

        $parishesByDiocese = $parishes->groupBy(function ($parish) {
            return $parish->diocese->name;
        });

        return view('users.settings', compact('parishesByDiocese'));
    }

    public function update(UpdateUserSettingsRequest $request)
    {
        $user = $request->user()->fill([
            'current_parish' => $request->default_parish
        ])->save();

        return back()->with('status', 'Settings updated successfully');
    }
}
