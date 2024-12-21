  <!-- Make the grid responsive -->
  <div x-data="{ open: false }" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold text-lg">Add Product Name</h3>
        <button @click="open = true" class="mt-1 bg-blue-500 text-white py-1 px-3 rounded">Add</button>
        <!-- Modal -->
        <div x-show="open" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
                <h2 class="text-xl font-bold">Add Product</h2>
                <form action="{{ route('products.store') }}" method="POST"  class="space-y-4" @submit="open = false">
                    @csrf
                    <div>
                        <label for="product-name" class="block text-sm font-medium text-gray-900">Product Name</label>
                        <input type="text" name="name" id="product-name" class="w-full border p-2 rounded" placeholder="Enter product name"  value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                        <input type="text" name="description" id="description" class="w-full border p-2 rounded" placeholder="Enter description"  value="{{ old('description') }}" required>
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-900">Price</label>
                        <input type="text" name="price" id="price" class="w-full border p-2 rounded" placeholder="Enter price" value="{{ old('price') }}" required>
                    </div>
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-900">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="w-full border p-2 rounded" placeholder="Enter quantity" value="{{ old('quantity') }}" required>
                    </div>
                    <div>
                        <select name="category_id" id="category" class="w-full border p-2 rounded" required>
                            <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <!-- Close button -->
                        <button @click="open = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                        <!-- Submit button -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>