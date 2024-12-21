<div x-data="{ openEdit: false }">
    <!-- Trigger Button -->
    <button @click="openEdit = true" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
    <!-- Modal -->
    <div x-show="openEdit" x-transition x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full">
            <h2 class="text-xl font-bold">Edit Customer</h2>
            <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name" class="w-full border p-2 rounded" placeholder="Enter product name"  value="{{ $customer->name }}" required>
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                    <input type="text" name="address" id="address" class="w-full border p-2 rounded" placeholder="Enter address"  value="{{ $customer->address }}" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="w-full border p-2 rounded" placeholder="Enter email" value="{{ $customer->email }}" required>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-900">Phone</label>
                    <input type="tel" name="phone" id="phone" class="w-full border p-2 rounded" placeholder="Enter phone" value="{{ $customer->phone }}" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <!-- Close button -->
                    <button @click="openEdit = false" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Close</button>
                    <!-- Submit button -->
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Edit Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>
