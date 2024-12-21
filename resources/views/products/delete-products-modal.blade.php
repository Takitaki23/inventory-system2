<div x-data="{ openDelete: false }" >
    <!-- Trigger Button -->
    <button @click="openDelete = true" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
    
        <!-- Modal -->
        <div x-show="openDelete" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 space-y-4">
                <!-- Modal Header -->
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">Delete Category</h2>
                    <button @click="openDelete = false" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
        
                <!-- Modal Body -->
                <div class="space-y-4">
                    <p class="text-gray-700">Are you sure you want to delete this category? This action cannot be undone.</p>
                </div>
        
                <!-- Modal Footer -->
                <div class="flex justify-between space-x-4">
                    <button @click="openDelete = false" class="w-full bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-200">
                        Cancel
                    </button>
                    <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
