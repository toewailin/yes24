<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the user's cart.
     */
    public function index()
    {
        // Fetch the cart items for the currently authenticated user
        $cartItems = Cart::with('item')
            ->where('user_id', auth()->id())
            ->get();

        return view('frontend.cart.index', compact('cartItems'));
    }

    /**
     * Add an item to the cart.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:products,id', // Ensure the item exists
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Product::findOrFail($request->item_id);

        Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'item_id' => $item->id,
            ],
            [
                'quantity' => $request->quantity,
                'price' => $item->price,
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    /**
     * Remove an item from the cart.
     */
    public function destroy(Cart $cartItem)
    {
        // Ensure the cart item belongs to the authenticated user
        if ($cartItem->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
