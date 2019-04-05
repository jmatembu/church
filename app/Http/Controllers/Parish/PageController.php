<?php

namespace App\Http\Controllers\Parish;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about(Parish $parish)
    {
        $page = $parish->about_page;

        return view('parish.pages.about', compact('page'));
    }
}
