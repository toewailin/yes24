<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts for the dashboard
        $data = [
            'artists' => \App\Models\Artist::count(),
            'banners' => \App\Models\Banner::count(),
            'categories' => \App\Models\Category::count(),
            'subcategories' => \App\Models\SubCategory::count(),
            'products' => \App\Models\Product::count(),
            'productDetails' => \App\Models\ProductDetail::count(),
            'carts' => \App\Models\Cart::count(),
            'orders' => \App\Models\Order::count(),
            'orderItems' => \App\Models\OrderProduct::count(),
            'faqs' => \App\Models\Faq::count(),
            'events' => \App\Models\Event::count(),
            'suppliers' => \App\Models\Supplier::count(),
        ];

        // Pass the data to the view
        return view('admin.dashboard', compact('data'));
    }
}
