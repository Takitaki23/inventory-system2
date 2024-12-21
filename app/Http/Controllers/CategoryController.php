<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        // dd($data);
        return view('category.index',compact('categories'));
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
          // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Create the category in the database
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('categories')->with('success', 'Category added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Update the category with the new data
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('categories')->with('success', 'Category updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect back with a success message
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}
