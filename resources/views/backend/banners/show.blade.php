<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banner Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <strong>Title:</strong> {{ $banner->title }}
                    </div>
                    <div class="mb-4">
                        <strong>Status:</strong> {{ $banner->status }}
                    </div>
                    <div class="mb-4">
                        <strong>Order:</strong> {{ $banner->order }}
                    </div>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
