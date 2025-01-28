<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the active banners.
     */
    public function index()
    {
        // Fetch all active banners ordered by 'order'
        $banners = Banner::where('is_active', true)->orderBy('order')->paginate(10);

        return view('frontend.banners.index', compact('banners'));
    }

    /**
     * Display the specified active banner.
     */
    public function show(Banner $banner)
    {
        // Ensure the banner is active
        if (!$banner->is_active) {
            abort(404); // Return a 404 error if the banner is not active
        }

        return view('frontend.banners.show', compact('banner'));
    }
}
