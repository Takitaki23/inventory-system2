<?php

namespace App\Http\Controllers;

use App\Models\Product; // For Product
use App\Models\Category; // For Category
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category')->get();
        $categories = Category::all(); // Fetch categories for the dropdown

        // dd($products);
        return view('products.index', compact('products', 'categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'supplier' => 'nullable|string|max:255',
       ]);

       Product::create($validatedData);

    //    dd($validatedData);

       return redirect()->route('products')->with('success', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::with('category')->findOrFail($id);  // Fetch the product by ID

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Ensure category exists
            'supplier' => 'nullable|string|max:255',
        ]);

        // Update the product
        $product->update($validatedData);

        // Redirect with success message
        return redirect()->route('products')->with('success', 'Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = Product::with('category')->findOrFail($id);  // Fetch the product by ID

         // Delete the category
         $product->delete();
 
         // Redirect back with a success message
         return redirect()->route('products')->with('success', 'Products deleted successfully.');
    }
}
