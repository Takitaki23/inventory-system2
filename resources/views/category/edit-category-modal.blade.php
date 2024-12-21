<div x-data="{ openEdit: false }">
    <!-- Trigger Button -->
    <button @click="openEdit = true" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
    
    <!-- Modal -->
    <div x-show="openEdit" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
            <h2 class="text-xl font-bold">Edit Category</h2>
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="category-name" class="block text-sm font-medium text-gray-900">Category Name</label>
                    <input type="text" name="name" id="category-name" value="{{ $category->name }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label for="category-description" class="block text-sm font-medium text-gray-900">Description</label>
                    <input type="text" name="description" id="category-description" value="{{ $category->description }}" class="w-full border p-2 rounded" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button @click="openEdit = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
