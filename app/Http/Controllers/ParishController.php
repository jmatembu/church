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
        $latestHomilies = $parish->categories()->whereName('Homilies')->first()->posts->sortByDesc('start_publishing_at')->take(5);
        $latestHomily = $latestHomilies->first();
        $projects = $parish->projects()->latest()->take(2)->get();

        return view('parish.index', compact('latestEvents', 'nextEvent', 'parish', 'news', 'latestHomilies', 'latestHomily', 'projects', 'latestNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parish $parish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish)
    {
        //
    }
}
