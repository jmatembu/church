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
        if (empty($request->user()->parish)) {
            return redirect()->route('users.account')->with('error', 'You need to set your default parish first before adding a prayer request.');
        }

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        $prayerRequest = $request->input();
        $prayerRequest['publish_at'] = now()->toDateTimeString();
        $prayerRequest['parish_id'] = $request->user()->current_parish;

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
     * @param \Illuminate\Http\Request $request
     * @param \App\PrayerRequest $prayerRequest
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, PrayerRequest $prayerRequest)
    {
        if ($request->user()->id !== $prayerRequest->user_id) {
            return redirect()->route('users.prayerRequests.index')
                ->with('error', 'Cannot update the prayer request. Permission denied.');
        }

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
        ]);

        $prayerRequest = $request->only(['title', 'description']);
        $prayerRequest['publish_at'] = now()->toDateTimeString();
        $prayerRequest['parish_id'] = $request->user()->current_parish;

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
        if (request()->user()->id !== $prayerRequest->user_id) {
            return redirect()->route('users.prayerRequests.index')
                ->with('error', 'Cannot delete the prayer request. Permission denied.');
        }

        try {
            $prayerRequest->delete();

            return redirect()->route('users.prayerRequests.index')
                ->with('success', 'Prayer request deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Could not delete prayer request at this moment. Try again or notify support.');
        }
    }
}
