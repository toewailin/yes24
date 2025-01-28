<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->orderBy('order', 'asc')->paginate(10);

        return view('frontend.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        // Load the parent category and associated products for the category
        $category->load(['parent', 'products' => function ($query) {
            $query->where('is_active', true)->orderBy('created_at', 'desc')->paginate(8);
        }]);
    
        return view('frontend.categories.show', compact('category'));
    }

}
