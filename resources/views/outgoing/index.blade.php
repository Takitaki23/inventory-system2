<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight z-10">
                {{ __('Outgoing Products') }}
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
                @include('outgoing.add-outgoing-modal')

                <!-- Category table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-4">
                    <table id="productTable" class="min-w-full table-auto">
                        <thead  class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">ID</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Product Name</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Customer</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Quantity</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Date</th>
                                <th class="py-2 px-4 border-b text-left font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outgoingProducts as $outgoingProduct)
                                <tr>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $outgoingProduct->id }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $outgoingProduct->product->name }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $outgoingProduct->customer->name }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $outgoingProduct->quantity }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">{{ $outgoingProduct->sale_date }}</td>
                                    <td class="py-2 px-4 border-b text-gray-900">
                                        @include('outgoing.edit-outgoing-modal', ['outgoingProduct' => $outgoingProduct])
                                        @include('outgoing.delete-outgoing-modal', ['outgoingProduct' => $outgoingProduct])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     
    </x-app-layout>