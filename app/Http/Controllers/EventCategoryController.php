<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        $eventCategories = EventCategory::paginate(10);
        return view('event_categories.index', compact('eventCategories'));
    }

    public function create()
    {
        return view('event_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EventCategory::create($request->all());

        return redirect()->route('event_categories.index')->with('success', 'Event Category created successfully.');
    }

    public function show(EventCategory $eventCategory)
    {
        return view('event_categories.show', compact('eventCategory'));
    }

    public function edit(EventCategory $eventCategory)
    {
        return view('event_categories.edit', compact('eventCategory'));
    }

    public function update(Request $request, EventCategory $eventCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $eventCategory->update($request->all());

        return redirect()->route('event_categories.index')->with('success', 'Event Category updated successfully.');
    }

    public function destroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();

        return redirect()->route('event_categories.index')->with('success', 'Event Category deleted successfully.');
    }
}