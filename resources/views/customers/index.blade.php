<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight z-10">
                {{ __('Customers') }}
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
                @include('customers.add-customers-modal')
    
                <!-- Product table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-4">
                    <table id="productTable" class="min-w-full table-auto">
                        <thead  class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">ID</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Name</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Address</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Email</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Phone</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $customer->id }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $customer->name }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $customer->address }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $customer->email }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $customer->phone }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">
                                        @include('customers.edit-customers-modal',['customers' => $customer])
                                        @include('customers.delete-customers-modal', ['customers' => $customer])
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