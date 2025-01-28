<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white text-center py-20">
    <div class="container mx-auto px-6">
        <!-- Hero Title -->
        <h1 class="text-4xl font-extrabold mb-4" style="font-family: 'Lobster', serif;">
            Welcome to yes24</span>
        </h1>
        <p class="text-lg mb-6">Discover a world of products at unbeatable prices!</p>
        
        <!-- Search Bar -->
        <form action="{{ route('products.search') }}" method="GET" class="flex justify-center mb-6">
            <input
                type="text"
                name="query"
                placeholder="Search for products..."
                class="px-4 py-2 w-2/3 rounded-l-lg text-gray-800 focus:outline-none focus:ring focus:ring-blue-400"
            />
            <button
                type="submit"
                class="bg-white text-blue-600 px-4 py-2 rounded-r-lg hover:bg-gray-100 shadow-md"
            >
                Search
            </button>
        </form>

        <!-- Call-to-Action -->
        <a href="{{ route('products.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg shadow-md hover:bg-gray-100">
            Start Shopping
        </a>
    </div>
</section>
