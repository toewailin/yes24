<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Product;

class AdminOrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderproducts = OrderProduct::with('order', 'item')->paginate(10);
        return view('backend.orderproducts.index', compact('orderproducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('backend.orderproducts.create', compact('orders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $validated['subtotal'] = $validated['quantity'] * $validated['price'];

        OrderProduct::create($validated);

        return redirect()->route('admin.order-products.index')->with('success', 'Order item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderProduct $orderItem)
    {
        return view('backend.orderproducts.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderProduct $orderItem)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('backend.orderproducts.edit', compact('orderItem', 'orders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderProduct $orderItem)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $validated['subtotal'] = $validated['quantity'] * $validated['price'];

        $orderItem->update($validated);

        return redirect()->route('admin.order-products.index')->with('success', 'Order item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderProduct $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('admin.order-products.index')->with('success', 'Order item deleted successfully.');
    }
}