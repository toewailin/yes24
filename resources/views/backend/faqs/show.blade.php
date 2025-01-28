<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">FAQ Details</h1>

                    <!-- Question -->
                    <div class="mb-4">
                        <h3 class="font-semibold text-gray-700">Question:</h3>
                        <p class="text-gray-600">{{ $faq->question }}</p>
                    </div>

                    <!-- Answer -->
                    <div class="mb-4">
                        <h3 class="font-semibold text-gray-700">Answer:</h3>
                        <p class="text-gray-600">{{ $faq->answer }}</p>
                    </div>

                    <!-- Order -->
                    <div class="mb-4">
                        <h3 class="font-semibold text-gray-700">Order:</h3>
                        <p class="text-gray-600">{{ $faq->order ?? 'N/A' }}</p>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <h3 class="font-semibold text-gray-700">Status:</h3>
                        <p class="text-gray-600">{{ $faq->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
