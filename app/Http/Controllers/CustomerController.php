<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::select('id', 'name', 'address', 'email', 'phone')->get();
        return view('customers.index', compact('customers'));
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
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|regex:/^[0-9\s\-+()]*$/|max:20',
        ]);

        Customer::create( $validatedData);

        return redirect()->route('customers')->with('success', 'Customer added successfully!');

        // dd($validatedData);

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
        //
        $customer = Customer::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $customer->update($validatedData);

        return redirect()->route('customers')->with('success', 'Customer update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $customer = Customer::findorFail($id);

        $customer->delete();

        // dd($customer);

        return redirect()->route('customers')->with('success', 'Customer deleted successfully');
        //
    }
}
