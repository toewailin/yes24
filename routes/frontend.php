<?php

use App\Http\Controllers\Frontend\{
    ArtistController,
    BannerController,
    CartController,
    CategoryController,
    CheckoutController,
    EventController,
    FaqController,
    HomeController,
    OrderController,
    ProductController,
    SubCategoryController,
    SupplierController,
    UserProfileController
};

    use Illuminate\Support\Facades\Route;

    // Frontend Routes

    // Home
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // Subcategories
    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/subcategories/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
    
    // Artist
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');

    // Banner
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/{banner}', [BannerController::class, 'show'])->name('banners.show');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
    // Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // FAQs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/{faq}', [FaqController::class, 'show'])->name('faqs.show');

    // Events
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Suppliers
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');

    // User Profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');

