<div class="h-screen bg-white shadow-lg p-4 md:w-64 w-full md:fixed">
        <!-- Sidebar -->
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 rounded">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}" class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 rounded">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 rounded">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('customers') }}" class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 rounded">
                        Customers
                    </a>
                </li>
                <li>
                    <a href="{{ route('outgoing') }}" class="block py-2 px-4 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 rounded">
                        Outgoing Products
                    </a>
                </li>
            </ul>
</div>