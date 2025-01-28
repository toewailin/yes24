<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supplier Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold">{{ $supplier->name }}</h3>
                    <p class="mt-4"><strong>Email:</strong> {{ $supplier->email }}</p>
                    <p class="mt-2"><strong>Phone:</strong> {{ $supplier->phone }}</p>
                    <p class="mt-2"><strong>Address:</strong> {{ $supplier->address }}</p>

                    <div class="mt-4">
                        <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-200 disabled:opacity-25 transition">
                            {{ __('Edit') }}
                        </a>
                        <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">
                                {{ __('Delete') }}
                            </button>
                        </form>
                        <a href="{{ route('admin.suppliers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
