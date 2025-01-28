<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Artist;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Faq;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve data from the database
        $banners = Banner::where('is_active', true)->orderBy('order')->get();
        $categories = Category::where('is_active', true)->orderBy('order')->get();
        $artists = Artist::all(); // List of all artists
        $items = Product::where('is_active', true)->orderBy('sales', 'desc')->take(8)->get(); // Best-Selling
        $suppliers = Supplier::take(8)->get();
        $events = Event::where('is_active', true)->orderBy('start_date')->take(3)->get(); // Limit to 3 upcoming events
        $faqs = Faq::where('is_active', true)->take(5)->get(); // Limit to 5 FAQs

        // Pass data to the view
        return view('frontend.home', compact('banners', 'categories', 'artists', 'suppliers', 'items', 'faqs', 'events'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Perform the search on items
        $items = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->where('is_active', true)
            ->paginate(10);

        // Pass the search results and query to the view
        return view('frontend.search_results', compact('items', 'query'));
    }

    public function category(Request $request)
    {
        $categories = Category::where('is_active', true)->orderBy('order')->paginate(8);
        return view('frontend.categories', compact('categories'));
    }
}
