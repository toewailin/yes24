<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4">
            @foreach ($faqs as $faq)
                <div class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $faq->question }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $faq->answer }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $faqs->links() }}
        </div>
    </section>
</x-user-layout>
