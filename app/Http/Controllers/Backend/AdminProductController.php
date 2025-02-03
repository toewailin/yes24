<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Artist;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'subcategory', 'artist', 'supplier')
            ->paginate(10);

        return view('backend.products.index', compact('products'));
    }

    /**
     * Search for products by name or other attributes.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('backend.products.search_results', compact('products', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch required data for dropdowns
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $suppliers = Supplier::all();
        $artists = Artist::all();

        // Pass the data to the view
        return view('backend.products.create', compact('categories', 'subcategories', 'suppliers', 'artists'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:products,name',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        'supplier_id' => 'nullable|exists:suppliers,id',
        'artist_id' => 'nullable|exists:artists,id',
        'image' => 'nullable|image|max:2048',
        'discount' => 'nullable|numeric|min:0|max:100',
        'tax' => 'nullable|numeric|min:0',
        'attributes' => 'nullable|array',
        'sku' => 'nullable|string|max:255|unique:products,sku',
    ]);

    // Handle SKU Generation
    $validated['sku'] = $validated['sku'] ?? 'SKU-' . strtoupper(\Str::random(8));

    // Handle Main Image
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    // Create the Item
    Product::create($validated);

    return redirect()->route('admin.products.index')->with('success', 'Item created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $item)
    {
        $item->load('category', 'subcategory', 'artist', 'supplier');

        return view('backend.products.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $item)
    {
        return view('backend.products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $item->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'artist_id' => 'nullable|exists:artists,id',
            'image' => 'nullable|image|max:2048',
            'discount' => 'nullable|numeric|min:0|max:100',
            'tax' => 'nullable|numeric|min:0',
            'attributes' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $item->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.products.index')->with('success', 'Item deleted successfully.');
    }
}
