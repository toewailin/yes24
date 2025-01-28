<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Upcoming Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($events as $event)
                <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ $event->description }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Date: {{ $event->start_date->format('M d, Y') }}</p>
                    <a href="{{ route('events.show', $event) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $events->links() }}
        </div>
    </section>
</x-user-layout>
