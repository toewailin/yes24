<div class="flex items-center p-6 bg-gray-100 rounded-xl shadow-lg dark:bg-gray-700 transition-all hover:shadow-xl hover:scale-105">
    <div class="p-4 bg-white rounded-full shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8 text-{{ $color }}-500">
            <use xlink:href="#{{ $icon }}"></use>
        </svg>
    </div>
    <div class="ml-5">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $title }}</h3>
        <p class="text-3xl font-extrabold text-gray-800 dark:text-white">{{ $count }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-400 opacity-70">{{ $description ?? 'Overview' }}</p>
    </div>
</div>
