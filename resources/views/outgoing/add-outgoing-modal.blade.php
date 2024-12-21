  <!-- Make the grid responsive -->
  <div x-data="{ open: false }" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold text-lg">Add New Outgoing Products</h3>
        <button @click="open = true" class="mt-1 bg-blue-500 text-white py-1 px-3 rounded">Add</button>
        <!-- Modal -->
        <div x-show="open" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
                <h2 class="text-xl font-bold">Add New Outgoing Products</h2>
                <form action="{{ route('outgoing.store') }}" method="POST"  class="space-y-4" @submit="open = false">
                    @csrf
                    <div>
                        <label for="product-id" class="block text-sm font-medium text-gray-900">Product Name</label>
                        <select name="product_id" id="product-id" class="w-full border p-2 rounded" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="customer-id" class="block text-sm font-medium text-gray-900">Customer</label>
                        <select name="customer_id" id="customer-id" class="w-full border p-2 rounded" required>
                            @foreach ($customers as $customer )
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-900">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="w-full border p-2 rounded" placeholder="Enter quantity" value="{{ old('quantity') }}" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <!-- Close button -->
                        <button @click="open = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                        <!-- Submit button -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>