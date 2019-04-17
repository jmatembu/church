<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\PrayerRequest;
use Illuminate\Http\Request;

class PrayerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayerRequests = request()->user()->prayerRequests;

        return view('accounts.prayer-requests.index', compact('prayerRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.prayer-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'parish_id' => 'required|exists:parishes,id'
        ]);

        $prayerRequest = $request->input();
        $prayerRequest['publish_at'] = now()->toDateTimeString();

        $request->user()->prayerRequests()->create($prayerRequest);

        return redirect()->route('users.prayerRequests.index')
            ->with('success', 'Prayer request added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PrayerRequest $prayerRequest)
    {
        return view('accounts.prayer-requests.show', $prayerRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PrayerRequest $prayerRequest)
    {
        return view('accounts.prayer-requests.edit', compact('prayerRequest'));
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
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'parish_id' => 'required|exists:parishes,id'
        ]);

        $prayerRequest = $request->only(['title', 'description', 'parish_id']);
        $prayerRequest['publish_at'] = now()->toDateTimeString();

        $request->user()->prayerRequests()->update($prayerRequest);

        return redirect()->route('users.prayerRequests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrayerRequest $prayerRequest
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(PrayerRequest $prayerRequest)
    {
        try {
            $prayerRequest->delete();

            return redirect()->route('users.prayerRequests.index')
                ->with('success', 'Prayer request deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Could not delete prayer request at this moment. Try again or notify support.');
        }
    }
}
