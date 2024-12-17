<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('organizer', 'eventCategory')
            ->where('active', 1)
            ->orderBy('date', 'asc')
            ->get();

        return view('events.index', compact('events')); 
    }

}