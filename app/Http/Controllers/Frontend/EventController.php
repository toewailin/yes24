<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        // Fetch only active events ordered by the start date
        $events = Event::where('is_active', true)
            ->orderBy('start_date', 'asc')
            ->paginate(10);

        return view('frontend.events.index', compact('events'));
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        // Ensure the event is active before displaying it
        if (!$event->is_active) {
            abort(404);
        }

        return view('frontend.events.show', compact('event'));
    }
}
