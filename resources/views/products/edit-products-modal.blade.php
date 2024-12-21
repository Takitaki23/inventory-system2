<div x-data="{ openEdit: false }">
    <!-- Trigger Button -->
    <button @click="openEdit = true" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
    <!-- Modal -->
    <div x-show="openEdit" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
            <h2 class="text-xl font-bold">Edit Products</h2>
            <form action="{{ route('products.update', $products->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="product-name" class="block text-sm font-medium text-gray-900">Product Name</label>
                    <input type="text" name="name" id="product-name" class="w-full border p-2 rounded" placeholder="Enter product name"  value="{{ $products->name }}" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                    <input type="text" name="description" id="description" class="w-full border p-2 rounded" placeholder="Enter description"  value="{{ $products->description }}" required>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-900">Price</label>
                    <input type="text" name="price" id="price" class="w-full border p-2 rounded" placeholder="Enter price" value="{{ $products->price }}" required>
                </div>
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-900">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="w-full border p-2 rounded" placeholder="Enter quantity" value="{{ $products->quantity }}" required>
                </div>
                <!-- Category -->
                <div>
                    <select name="category_id" class="w-full border p-2 rounded">
                        <option value="{{ $products->category->id }}" selected>{{ $products->category->name }}</option>
                        <!-- Optionally, you can load categories dynamically -->
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="supplier" class="block text-sm font-medium text-gray-900">Supplier</label>
                    <input type="text" name="supplier" id="supplier" class="w-full border p-2 rounded" placeholder="Enter supplier" value="{{ $products->supplier }}" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <!-- Close button -->
                    <button @click="openEdit = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                    <!-- Submit button -->
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Edit Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
