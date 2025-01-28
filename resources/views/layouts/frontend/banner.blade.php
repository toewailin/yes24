@if ($banners->isNotEmpty())
    <section class="bg-gray-100 py-8 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Promotions</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($banners as $banner)
                    <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="rounded-lg mb-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $banner->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $banner->description }}</p>
                        @if ($banner->link)
                            <a href="{{ $banner->link }}" target="_blank" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                                Learn More
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
