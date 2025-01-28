<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Events</h1>
                    <a href="{{ route('admin.events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Add New Event
                    </a>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Title</th>
                                    <th class="border border-gray-300 px-4 py-2">Start Date</th>
                                    <th class="border border-gray-300 px-4 py-2">End Date</th>
                                    <th class="border border-gray-300 px-4 py-2">Location</th>
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y, g:i a') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->location ?? 'N/A' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.events.show', $event) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                                    View
                                                </a>
                                                <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center border border-gray-300 px-4 py-2">No events found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
