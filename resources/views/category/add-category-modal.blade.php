<div x-data="{ openAdd: false }">
    <!-- Trigger Button -->
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold text-lg">Add Category Name</h3>
        <button @click="openAdd = true" class="bg-blue-500 text-white py-1 px-3 rounded">Add Category</button>
    </div>
   
    <!-- Modal -->
    <div x-show="openAdd" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
            <h2 class="text-xl font-bold">Add Category</h2>
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="category-name" class="block text-sm font-medium text-gray-900">Category Name</label>
                    <input type="text" name="name" id="category-name" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label for="category-description" class="block text-sm font-medium text-gray-900">Description</label>
                    <input type="text" name="description" id="category-description" class="w-full border p-2 rounded" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button @click="openAdd = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
