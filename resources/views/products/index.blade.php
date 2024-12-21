<x-app-layout>
<!-- Header -->
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight z-10">
            {{ __('Products') }}
        </h2>
</x-slot>

    <!-- Main Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="">
            <x-sidebar />
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-4 md:ml-64">
            <!-- Include Add Modal -->
            @include('products.add-products-modal')


            <!-- Product table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-4">
                <table id="productTable" class="min-w-full table-auto">
                    <thead  class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">ID</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Product Name</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Description</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Price</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Quantity</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Category</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->id }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->name }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->description }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->price }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->quantity }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $product->category->name ?? 'No Category' }}</td>

                                <td class="py-2 px-4 border-b text-gray-900">
                                    @include('products.edit-products-modal', ['products' => $product])
                                    @include('products.delete-products-modal', ['products' => $product])
                                </td>
                            </tr>
                        @endforeach
                           
                    </tbody>
                </table>
            </div>
            <!-- End Product table -->
        </div>
    </div>
 
</x-app-layout>