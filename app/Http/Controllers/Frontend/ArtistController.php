<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the artists.
     */
    public function index()
    {
        // Fetch all active artists and paginate them
        $artists = Artist::where('is_active', true)->paginate(10);

        return view('frontend.artists.index', compact('artists'));
    }

    /**
     * Display the specified artist.
     */
    public function show(Artist $artist)
    {
        // Ensure the artist is active
        if (!$artist->is_active) {
            abort(404); // Return a 404 error if the artist is not active
        }

        return view('frontend.artists.show', compact('artist'));
    }
}
