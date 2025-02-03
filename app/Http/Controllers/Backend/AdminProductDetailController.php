<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class AdminProductDetailController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index(Product $item)
    {
        $ProductDetails = $item->details()->orderBy('display_order')->get();

        return view('backend.productdetails.index', compact('item', 'ProductDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $item)
    {
        return view('backend.productdetails.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $item)
    {
        $validated = $request->validate([
            'attribute_name' => 'required|string|max:255',
            'attribute_value' => 'required|string|max:255',
            'is_visible' => 'boolean',
            'display_order' => 'integer|min:0',
        ]);

        $item->details()->create($validated);

        return redirect()->route('products.details.index', $item)
            ->with('success', 'Item detail added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $item, ProductDetail $detail)
    {
        return view('backend.productdetails.edit', compact('item', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $item, ProductDetail $detail)
    {
        $validated = $request->validate([
            'attribute_name' => 'required|string|max:255',
            'attribute_value' => 'required|string|max:255',
            'is_visible' => 'boolean',
            'display_order' => 'integer|min:0',
        ]);

        $detail->update($validated);

        return redirect()->route('products.details.index', $item)
            ->with('success', 'Item detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $item, ProductDetail $detail)
    {
        $detail->delete();

        return redirect()->route('products.details.index', $item)
            ->with('success', 'Item detail deleted successfully.');
    }
}