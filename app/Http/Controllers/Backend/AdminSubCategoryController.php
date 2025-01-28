<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->paginate(10);

        return view('backend.subcategories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch only active categories for the dropdown.
        $categories = Category::where('is_active', true)->get();

        return view('backend.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name',
            'slug' => 'nullable|string|max:255|unique:subcategories,slug', // Slug is optional
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'category_id' => 'required|exists:categories,id', // Ensure valid category
        ]);

        // Generate a slug if not provided
        $validated['slug'] = $validated['slug'] ?? \Str::slug($validated['name']);

        // Set default value for is_active if not provided
        $validated['is_active'] = $request->boolean('is_active', true);

        // Create the subcategory
        SubCategory::create($validated);

        // Redirect with success message
        return redirect()->route('admin.subcategories.index')->with('success', 'SubCategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category'); // Load the parent category relationship

        return view('backend.subcategories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        // Fetch only active categories for the dropdown, excluding the current subcategory's parent to avoid issues
        $categories = Category::where('is_active', true)->get();

        return view('backend.subcategories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name,' . $subCategory->id,
            'slug' => 'nullable|string|max:255|unique:subcategories,slug,' . $subCategory->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate a slug if not provided
        $validated['slug'] = $validated['slug'] ?? \Str::slug($validated['name']);

        // Set default value for is_active if not provided
        $validated['is_active'] = $request->boolean('is_active', true);

        // Update the subcategory
        $subCategory->update($validated);

        // Redirect with success message
        return redirect()->route('admin.subcategories.index')->with('success', 'SubCategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        // Soft-delete the subcategory
        $subCategory->delete();

        // Redirect with success message
        return redirect()->route('admin.subcategories.index')->with('success', 'SubCategory deleted successfully.');
    }
}
