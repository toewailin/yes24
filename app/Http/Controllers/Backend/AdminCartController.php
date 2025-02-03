<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
     /**
     * Display the user's cart.
     */
    public function index()
    {
        // Fetch carts with pagination (10 records per page)
        $carts = Cart::with(['user', 'item'])->paginate(10);

        return view('backend.carts.index', compact('carts'));
    }

    /**
     * Add an item to the cart.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Product::findOrFail($request->product_id);

        $cart = Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $item->id,
            ],
            [
                'quantity' => $request->quantity,
                'price' => $item->price,
            ]
        );

        return redirect()->route('carts.index')->with('success', 'Item added to cart!');
    }

    /**
     * Update the quantity of an item in the cart.
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('carts.index')->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove an item from the cart.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carts.index')->with('success', 'Item removed from cart!');
    }
}
