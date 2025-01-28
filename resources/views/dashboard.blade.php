<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Metrics Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Sales -->
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-700 text-lg">Total Sales</h3>
                        <p class="text-2xl font-bold text-green-500 mt-2">$24,320</p>
                        <p class="text-sm text-gray-500 mt-1">Compared to last month</p>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-700 text-lg">Total Orders</h3>
                        <p class="text-2xl font-bold text-blue-500 mt-2">1,452</p>
                        <p class="text-sm text-gray-500 mt-1">Compared to last month</p>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-700 text-lg">Total Customers</h3>
                        <p class="text-2xl font-bold text-purple-500 mt-2">680</p>
                        <p class="text-sm text-gray-500 mt-1">Compared to last month</p>
                    </div>
                </div>
            </div>

            <!-- Sales Summary Section -->
            <div class="mt-8 bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Sales Summary</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        <div class="p-4 bg-gray-50 border rounded-lg">
                            <p class="text-sm text-gray-500">Today</p>
                            <p class="text-lg font-bold text-gray-700">$3,200</p>
                        </div>
                        <div class="p-4 bg-gray-50 border rounded-lg">
                            <p class="text-sm text-gray-500">This Week</p>
                            <p class="text-lg font-bold text-gray-700">$15,400</p>
                        </div>
                        <div class="p-4 bg-gray-50 border rounded-lg">
                            <p class="text-sm text-gray-500">This Month</p>
                            <p class="text-lg font-bold text-gray-700">$65,800</p>
                        </div>
                        <div class="p-4 bg-gray-50 border rounded-lg">
                            <p class="text-sm text-gray-500">Year to Date</p>
                            <p class="text-lg font-bold text-gray-700">$320,500</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="mt-8 bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Sales Overview</h3>
                    <div class="mt-4">
                        <!-- Placeholder for charts -->
                        <div class="h-64 bg-gray-100 border rounded-lg flex items-center justify-center">
                            <p class="text-gray-500">[Chart Placeholder]</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="mt-8 bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-gray-700 text-lg">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        <!-- <a href="" class="block p-4 bg-blue-500 text-white rounded-lg text-center hover:bg-blue-600">
                            Add New Item
                        </a> -->
                        <a href="{{ route('frontend.orders.index') }}" class="block p-4 bg-green-500 text-white rounded-lg text-center hover:bg-green-600">
                            View My Orders
                        </a>
                        <!-- <a href="" class="block p-4 bg-purple-500 text-white rounded-lg text-center hover:bg-purple-600">
                            Manage Categories
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
