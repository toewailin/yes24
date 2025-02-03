@if ($faqs->isNotEmpty())
    <section class="bg-gray-100 py-16 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md p-4 dark:bg-gray-700">
                        <button
                            @click="open = !open"
                            class="flex justify-between products-center w-full text-left text-lg font-bold text-gray-800 dark:text-white focus:outline-none"
                        >
                            {{ $faq->question }}
                            <svg
                                x-show="!open"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <svg
                                x-show="open"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m8-8v16" />
                            </svg>
                        </button>
                        <p x-show="open" x-collapse class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ $faq->answer }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
