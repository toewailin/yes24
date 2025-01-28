<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Add New FAQ Button -->
                    <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mb-4 inline-block">
                        Add New FAQ
                    </a>

                    <!-- FAQs Table -->
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Question</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Order</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqs as $faq)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $faq->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $faq->formatted_question }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $faq->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $faq->order }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.faqs.show', $faq) }}" class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                View
                                            </a>
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">
                                        No FAQs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $faqs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
