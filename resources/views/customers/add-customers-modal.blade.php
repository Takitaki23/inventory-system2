  <!-- Make the grid responsive -->
  <div x-data="{ open: false }" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-bold text-lg">Add Customers</h3>
        <button @click="open = true" class="mt-1 bg-blue-500 text-white py-1 px-3 rounded">Add</button>
        <!-- Modal -->
        <div x-show="open" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
                <h2 class="text-xl font-bold">Add Customers</h2>
                <form action="{{ route('customers.store') }}" method="POST"  class="space-y-4" @submit="open = false">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" class="w-full border p-2 rounded" placeholder="Enter customer name"  value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                        <input type="text" name="address" id="address" class="w-full border p-2 rounded" placeholder="Enter address"  value="{{ old('address') }}" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="w-full border p-2 rounded" placeholder="Enter email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-900">Phone</label>
                        <input type="tel" name="phone" id="phone" class="w-full border p-2 rounded" placeholder="Enter phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <!-- Close button -->
                        <button @click="open = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                        <!-- Submit button -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>