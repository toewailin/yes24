<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Our Suppliers</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($suppliers as $supplier)
                <div class="bg-white rounded-lg shadow-md p-4 text-center dark:bg-gray-800">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $supplier->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $supplier->description }}</p>
                    <a href="{{ route('suppliers.show', $supplier) }}" class="block mt-4 text-blue-600 hover:underline dark:text-blue-400">
                        View Products
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $suppliers->links() }}
        </div>
    </section>
</x-user-layout>
