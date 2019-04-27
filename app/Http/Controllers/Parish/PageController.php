<?php

namespace App\Http\Controllers\Parish;

use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function parish(Parish $parish) {
        $latestEvents = $parish->events->sortByDesc('starts_at')->take(3);
        $nextEvent = $latestEvents->first();
        $news = $parish->news->take(3);
        $latestNews = $news->first();
        $homilyCategory = $parish->categories()->whereName('Homilies')->first();

        if ($homilyCategory) {
            $latestHomilies = $homilyCategory->posts->sortByDesc('start_publishing_at')->take(5);
            $latestHomily = $latestHomilies->first();
        } else {
            $latestHomilies = collecte([]);
            $latestHomily = null;
        }

        $projects = $parish->projects()->latest()->take(2)->get();

        return view('parish.index', compact('latestEvents', 'nextEvent', 'parish', 'news', 'latestHomilies', 'latestHomily', 'projects', 'latestNews'));
    }
    public function about(Parish $parish)
    {
        $page = $parish->about_page;

        return view('parish.pages.about', compact('page'));
    }
}
