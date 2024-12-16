<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organizer;
use Illuminate\Support\Facades\Log;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::paginate(10); // Pagination dengan 10 data per halaman
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'facebook_link' => 'nullable|url',
                'x_link' => 'nullable|url',
                'website_link' => 'nullable|url',
                'description' => 'nullable|string',
            ]);

            Organizer::create($request->all());

            return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log error message
            return redirect()->back()->with('error', 'Failed to create organizer.'); 
        }
    }

    public function show(Organizer $organizer)
    {
        return view('organizers.show', compact('organizer'));
    }

    public function edit(Organizer $organizer)
    {
        return view('organizers.edit', compact('organizer'));
    }

    public function update(Request $request, Organizer $organizer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $organizer->update($request->all());

        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    public function destroy(Organizer $organizer)
    {
        $organizer->delete();

        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
}