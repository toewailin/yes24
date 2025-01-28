<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10); // Paginate suppliers
        return view('backend.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name',
            'email' => 'required|email|max:255|unique:suppliers,contact_email', // Updated field
            'phone' => 'nullable|string|max:20', // Updated field
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Rename `email` and `phone` to match the database column names
        $validated['contact_email'] = $validated['email'];
        $validated['contact_phone'] = $validated['phone'];
        unset($validated['email'], $validated['phone']); // Remove fields not present in the DB

        Supplier::create($validated);

        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('backend.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('backend.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
            'contact_email' => 'required|email|max:255|unique:suppliers,contact_email,' . $supplier->id,
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $supplier->update($validated);

        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
