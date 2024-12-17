<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterEventController extends Controller
{
    public function index() 
    {
        $events = Event::with('organizer', 'eventCategory')
            ->where('active', 1)
            ->orderBy('date', 'asc')
            ->paginate(10); 

        return view('events.index_master', compact('events')); 
    }

    public function create()
    {
        $organizers = Organizer::all();
        $eventCategories = EventCategory::all();
        return view('events.create', compact('organizers', 'eventCategories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'venue' => 'required|string|max:255',
                'date' => 'required|date',
                'start_time' => 'required',
                'description' => 'nullable|string',
                'booking_url' => 'nullable|url',
                'tags' => 'nullable|string',
                'organizer_id' => 'required|exists:organizers,id',
                'event_category_id' => 'required|exists:event_categories,id',
            ]);

            Event::create($request->all());

            return redirect()->route('events.index')->with('success', 'Event created successfully.'); 

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create event.');
        }
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $organizers = Organizer::all();
        $eventCategories = EventCategory::all();
        return view('events.edit', compact('event', 'organizers', 'eventCategories'));
    }

    public function update(Request $request, Event $event)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'venue' => 'required|string|max:255',
                'date' => 'required|date',
                'start_time' => 'required',
                'description' => 'nullable|string',
                'booking_url' => 'nullable|url',
                'tags' => 'nullable|string',
                'organizer_id' => 'required|exists:organizers,id',
                'event_category_id' => 'required|exists:event_categories,id',
            ]);

            $event->update($request->all());

            return redirect()->route('events.index')->with('success', 'Event updated successfully.'); 

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update event.');
        }
    }

    public function destroy(Event $event)
    {
        try {
            $event->delete();

            return redirect()->route('events.index')->with('success', 'Event deleted successfully.'); 

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete event.');
        }
    }
}