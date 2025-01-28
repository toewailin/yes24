<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Artists</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($artists as $artist)
                <div class="bg-white rounded-lg shadow-md p-4 text-center dark:bg-gray-800">
                    <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="w-24 h-24 mx-auto mb-4 rounded-lg">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $artist->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $artist->genre }}</p>
                    <a href="{{ route('artists.show', $artist) }}" class="block mt-4 text-blue-600 hover:underline dark:text-blue-400">View Details</a>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $artists->links() }}
        </div>
    </section>
</x-user-layout>
