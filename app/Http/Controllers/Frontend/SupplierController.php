<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of active suppliers.
     */
    public function index()
    {
        // Fetch all active suppliers, sorted by name
        $suppliers = Supplier::where('is_active', true)
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('frontend.suppliers.index', compact('suppliers'));
    }

    /**
     * Display the specified supplier and its products.
     */
    public function show(Supplier $supplier)
    {
        // Only show if the supplier is active
        if (!$supplier->is_active) {
            abort(404, 'Supplier not found.');
        }
    
        // Fetch the products related to the supplier
        $products = $supplier->products()->where('is_active', true)->paginate(12);
    
        return view('frontend.suppliers.show', compact('supplier', 'products'));
    }
    
}
