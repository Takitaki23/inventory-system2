<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Outgoing;
use App\Models\Product;
use Illuminate\Http\Request;

class OutgoingController extends Controller
{
    //

    public function index(){    

        $outgoingProducts = Outgoing::with('product', 'customer')->get();
        
        // Fetch products and customers to populate the dropdown in the form
        $products = Product::all();
        $customers = Customer::all();

        // dd($outgoingProducts );
        return view('outgoing.index',compact('outgoingProducts','products','customers'));
    }

    public function store(Request $request){
        
        // Validate incoming data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create new outgoing product record
        $outgoingProduct = Outgoing::create([
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'sale_date' => now(), // You can adjust the date format as needed
        ]);

        // dd($outgoingProduct);

        return redirect()->route('outgoing');

    }

    public function update(Request $request, string $id){

        // Find the outgoing product using findOrFail to ensure the record exists
        $outgoingProduct = Outgoing::findOrFail($id);

          // Update the outgoing product record
        $outgoingProduct->update([
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'sale_date' => now(), // You can adjust the date format as needed
        ]);
        return redirect()->route('outgoing');
    }

    public function destroy($id){

        // Find the outgoing product by ID
        $outgoingProduct = Outgoing::findOrFail($id);

        // Delete the outgoing product
        $outgoingProduct->delete();

        // dd($outgoingProduct);

        return redirect()->route('outgoing');
    }
}
