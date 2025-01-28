<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $event->title }}</h1>

                    <!-- Image -->
                    @if ($event->image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded-md shadow-md max-w-full h-auto">
                        </div>
                    @endif

                    <!-- Description -->
                    @if ($event->description)
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                            <p class="text-gray-600">{{ $event->description }}</p>
                        </div>
                    @endif

                    <!-- Dates -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-700">Event Dates</h2>
                        <p><strong>Start Date:</strong> {{ $event->start_date->format('F j, Y, g:i a') }}</p>
                        <p><strong>End Date:</strong> {{ $event->end_date->format('F j, Y, g:i a') }}</p>
                    </div>

                    <!-- Location -->
                    @if ($event->location)
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-700">Location</h2>
                            <p class="text-gray-600">{{ $event->location }}</p>
                        </div>
                    @endif

                    <!-- Status -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-700">Status</h2>
                        <p class="{{ $event->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $event->is_active ? 'Active' : 'Inactive' }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.events.edit', $event) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Back to Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
