<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Event</h1>
                    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ $event->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" rows="4">{{ $event->description }}</textarea>
                        </div>

                        <!-- Start Date -->
                        <div class="mb-6">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="datetime-local" name="start_date" id="start_date" value="{{ $event->start_date->format('Y-m-d\TH:i') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- End Date -->
                        <div class="mb-6">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="datetime-local" name="end_date" id="end_date" value="{{ $event->end_date->format('Y-m-d\TH:i') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- Location -->
                        <div class="mb-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" value="{{ $event->location }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @if ($event->image)
                                <div class="mt-4">
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="rounded-md shadow-md max-w-full h-auto">
                                </div>
                            @endif
                        </div>

                        <!-- Active Checkbox -->
                        <div class="mb-6 flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ $event->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
