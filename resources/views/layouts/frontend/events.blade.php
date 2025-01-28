@if ($events->isNotEmpty())
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Upcoming Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($events as $event)
                <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-800">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded-lg mb-4 w-full h-40 object-cover">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        <strong>Date:</strong> {{ $event->start_date->format('M d, Y') }}
                        @if ($event->end_date)
                            - {{ $event->end_date->format('M d, Y') }}
                        @endif
                    </p>
                    @if ($event->location)
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2"><strong>Location:</strong> {{ $event->location }}</p>
                    @endif
                    <a href="{{ route('events.show', $event) }}" class="block bg-blue-600 text-white text-center rounded-lg py-2 mt-4 hover:bg-blue-700">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endif
