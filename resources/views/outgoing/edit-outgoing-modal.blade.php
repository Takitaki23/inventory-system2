    <div x-data="{ openEdit: false }">
        <!-- Trigger Button -->
        <button @click="openEdit = true" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
        <!-- Modal -->
        <div x-show="openEdit" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
                <h2 class="text-xl font-bold">Edit Outgoing</h2>
                <form action="{{ route('outgoing.update', $outgoingProduct->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Product Name</label>
                        <select name="product_id" id="product-id" class="w-full border p-2 rounded" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $outgoingProduct->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                        @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-900">Customer Name</label>
                        <select name="customer_id" id="customer-id" class="w-full border p-2 rounded" required>
                            @foreach ($customers as $customer )
                                <option value="{{ $customer->id }}" {{ $customer->id == $outgoingProduct->customer_id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-900">Quantity</label>
                        <input type="quantity" name="quantity" id="quantity" class="w-full border p-2 rounded" placeholder="Enter quantity" value="{{ $outgoingProduct->quantity }}" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <!-- Close button -->
                        <button @click="openEdit = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                        <!-- Submit button -->
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
