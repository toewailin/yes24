<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Fetch active products with their relationships (category, etc.)
        $products = Product::with(['category', 'subcategory', 'artist', 'supplier'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Fetch categories for filtering (optional)
        $categories = Category::where('is_active', true)->orderBy('name')->get();

        return view('frontend.products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        // Ensure the product is active before showing it
        if (!$product->is_active) {
            abort(404, 'Product not found');
        }

        // Load relationships for additional details
        $product->load(['category', 'subcategory', 'artist', 'supplier']);

        return view('frontend.products.show', compact('product'));
    }

    /**
     * Search for products by name or description.
     */
    public function search(Request $request)
    {
        // Retrieve the search query
        $query = $request->input('query');
    
        // If the query is empty, redirect back with an error message
        if (!$query) {
            return redirect()->route('products.index')->with('error', 'Please enter a search query.');
        }
    
        // Fetch products matching the query
        $products = Product::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->paginate(12);
    
        // Pass data to the search results view
        return view('frontend.products.search', compact('products', 'query'));
    }
    

}
