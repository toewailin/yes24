<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Banners</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($banners as $banner)
                <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="rounded-lg mb-4">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $banner->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $banner->description }}</p>
                    <a href="{{ route('banners.show', $banner) }}" class="block mt-4 text-blue-600 hover:underline dark:text-blue-400">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $banners->links() }}
        </div>
    </section>
</x-user-layout>
