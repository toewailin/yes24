<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <div class="bg-white rounded-lg shadow-md p-6 dark:bg-gray-800">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">{{ $faq->question }}</h1>
            <p class="text-gray-600 dark:text-gray-400">
                {{ $faq->answer }}
            </p>
        </div>
    </section>
</x-user-layout>
