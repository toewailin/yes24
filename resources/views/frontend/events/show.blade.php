<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $event->title }}</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Date: {{ $event->start_date->format('M d, Y') }} - {{ $event->end_date->format('M d, Y') }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Location: {{ $event->location ?? 'Not specified' }}
            </p>
            <div class="text-gray-800 dark:text-white">
                {{ $event->description }}
            </div>
            @if ($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded-lg mt-4">
            @endif
        </div>
    </section>
</x-user-layout>
