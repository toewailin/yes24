<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('order')->paginate(10);
        return view('backend.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Convert the 'is_active' checkbox value to boolean
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_active' => 'nullable', // Temporarily allow nullable
            'order' => 'nullable|integer',
        ]);

        // Properly handle 'is_active' as a boolean
        $validated['is_active'] = $request->has('is_active'); // This converts "on" to true or defaults to false

        // Set the order to max order + 1 if not provided
        $validated['order'] = $validated['order'] ?? Faq::max('order') + 1;

        // Create the FAQ record
        Faq::create($validated);

        // Redirect back to the index with a success message
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('backend.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_active' => 'required|boolean',
            'order' => 'nullable|integer',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
