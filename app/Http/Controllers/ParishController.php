<?php

namespace App\Http\Controllers;

use App\Event;
use App\Parish;
use Illuminate\Http\Request;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parish = $request->user()->parish;
        
        $latestEvents = $parish->events->sortByDesc('starts_at')->take(3);
        $nextEvent = $latestEvents->first();
        $news = $parish->news->take(3);
        $latestNews = $news->first();
        $homilyCategory = $parish->categories()->whereName('Homilies')->first();

        if ($homilyCategory) {
            $latestHomilies = $homilyCategory->posts->sortByDesc('start_publishing_at')->take(5);
            $latestHomily = $latestHomilies->first();
        } else {
            $latestHomilies = collect([]);
            $latestHomily = null;
        }

        $projects = $parish->projects()->latest()->take(2)->get();

        return view('parish.index', compact('latestEvents', 'nextEvent', 'parish', 'news', 'latestHomilies', 'latestHomily', 'projects', 'latestNews'));
    }
}
