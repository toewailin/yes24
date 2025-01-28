<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of active FAQs.
     */
    public function index()
    {
        // Fetch only active FAQs ordered by 'order' column
        $faqs = Faq::where('is_active', true)
            ->orderBy('order', 'asc')
            ->paginate(10);

        return view('frontend.faqs.index', compact('faqs'));
    }

    /**
     * Display the specified FAQ.
     */
    public function show(Faq $faq)
    {
        // Ensure that only active FAQs are accessible
        if (!$faq->is_active) {
            abort(404);
        }

        return view('frontend.faqs.show', compact('faq'));
    }
}
