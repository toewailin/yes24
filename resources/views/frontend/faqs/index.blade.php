<x-user-layout>
    <section class="container mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4">
            @foreach ($faqs as $faq)
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                    <!-- Question with Dropdown Arrow -->
                    <button @click="open = !open" class="w-full flex justify-between items-center text-lg font-bold text-gray-800 dark:text-white">
                        <span>{{ $faq->question }}</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform duration-300 text-gray-600 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Collapsible Answer -->
                    <div x-show="open" x-collapse class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $faqs->links() }}
        </div>
    </section>
</x-user-layout>
