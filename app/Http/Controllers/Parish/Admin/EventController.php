<?php

namespace App\Http\Controllers\Parish\Admin;

use App\Event;
use App\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Parish $parish)
    {
        $events = $parish->events->paginate(10);

        return view('parish.admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parish.admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Parish $parish
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Parish $parish)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string|max:255',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $record = $request->only(['title', 'description', 'venue', 'starts_at', 'ends_at']);

        $parish->events()->create($record);

        return redirect()->route('parish.admin.events.index', $parish)
            ->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish, Event $event)
    {
        return view('parish.admin.events.show', compact('parish', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Parish $parish
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish, Event $event)
    {
        return view('parish.admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Parish $parish
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Parish $parish, Event $event)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string|max:255',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $record = $request->only(['title', 'description', 'venue', 'starts_at', 'ends_at']);

        $event->fill($record)->save();

        return redirect()->route('parish.admin.events.index', $parish)
                         ->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish, Event $event)
    {
        try {
            $event->delete();

            return redirect()->route('parish.admin.events.index', $parish)
                             ->with('success', 'Event deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
