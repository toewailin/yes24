<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit FAQ</h1>
                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Question -->
                        <div class="mb-6">
                            <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                            <input type="text" name="question" id="question" value="{{ $faq->question }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- Answer -->
                        <div class="mb-6">
                            <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                            <textarea name="answer" id="answer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" rows="4" required>{{ $faq->answer }}</textarea>
                        </div>

                        <!-- Order -->
                        <div class="mb-6">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                            <input type="number" name="order" id="order" value="{{ $faq->order }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" min="1">
                        </div>

                        <!-- Active Checkbox -->
                        <div class="mb-6 flex products-center">
                            <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ $faq->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update FAQ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
