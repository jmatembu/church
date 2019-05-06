<?php

namespace App\Http\Controllers;

use App\Event;
use App\Parish;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Parish $parish)
    {
        return view('parish.events.index');
    }

    public function show(Parish $parish, Event $event)
    {
        return view('parish.events.show', compact('event'));
    }
}
