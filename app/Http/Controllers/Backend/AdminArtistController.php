<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class AdminArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::paginate(10);

        return view('backend.artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:artists,name',
            'bio' => 'nullable|string',
            'genre' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean', // Allow nullable but default to true
        ]);

        // Generate slug from name if not provided
        $validated['slug'] = \Str::slug($validated['name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('artists', 'public');
        }

        // Default 'is_active' to true if not provided
        $validated['is_active'] = $request->boolean('is_active', true);

        Artist::create($validated);

        return redirect()->route('admin.artists.index')->with('success', 'Artist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('backend.artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('backend.artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:artists,name,' . $artist->id,
            'bio' => 'nullable|string',
            'genre' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($artist->image) {
                \Storage::disk('public')->delete($artist->image);
            }
            $validated['image'] = $request->file('image')->store('artists', 'public');
        }

        $artist->update($validated);

        return redirect()->route('admin.artists.index')->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        if ($artist->image) {
            \Storage::disk('public')->delete($artist->image);
        }

        $artist->delete();

        return redirect()->route('admin.artists.index')->with('success', 'Artist deleted successfully.');
    }
}
