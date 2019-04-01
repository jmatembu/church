<?php

namespace App\Http\Controllers\Parish;

use App\Parish;
use App\PrayerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrayerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Parish $parish)
    {
        $prayerRequests = $parish->prayerRequests()->paginate(15);

        return view('parish.prayer-requests.index', compact('prayerRequests'));
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
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PrayerRequest $prayerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PrayerRequest $prayerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrayerRequest $prayerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrayerRequest $prayerRequest)
    {
        //
    }
}
