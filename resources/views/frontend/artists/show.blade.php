<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $artist->name }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-6">{{ $artist->bio }}</p>
            @if ($artist->image)
                <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="rounded-lg mb-6">
            @endif
            <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Genre:</strong> {{ $artist->genre }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Status:</strong> {{ $artist->is_active ? 'Active' : 'Inactive' }}</p>
        </div>
    </section>
</x-user-layout>
