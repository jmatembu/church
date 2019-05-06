<?php

namespace App\Http\Controllers\Site;

use App\Diocese;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DioceseController extends Controller
{
    /**
     * Show diocese website
     *
     * @param Diocese $diocese
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Diocese $diocese)
    {
        return view('diocese.welcome', compact('diocese'));
    }
}
