<x-app-layout>
<!-- Header -->
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight z-10">
            {{ __('Categories') }}
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
             @include('category.add-category-modal')

            <!-- Category table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-4">
                <table id="productTable" class="min-w-full table-auto">
                    <thead  class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">ID</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Category Name</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Description</th>
                            <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $category->id }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $category->name }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">{{ $category->description }}</td>
                                <td class="py-2 px-4 border-b text-gray-900">
                                    @include('category.edit-category-modal', ['category' => $category])
                                    @include('category.delete-category-modal', ['category' => $category])
                                </td>
                            </tr>
                        @endforeach
                          
                    </tbody>
                </table>
            </div>
            <!-- End Category table -->
        </div>
    </div>
 
</x-app-layout>