<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $banner->title }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-6">{{ $banner->description }}</p>
            @if ($banner->image)
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="rounded-lg mb-6">
            @endif
            @if ($banner->link)
                <a href="{{ $banner->link }}" target="_blank" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700">
                    Learn More
                </a>
            @endif
        </div>
    </section>
</x-user-layout>
