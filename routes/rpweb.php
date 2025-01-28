<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrHomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [FrHomeController::class, 'home'])->name('home');
Route::get('banners', [BannerController::class, 'index'])->name('banners.index');
Route::get('banners/{banner}', [BannerController::class, 'show'])->name('banners.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('subcategories/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('items', [ItemController::class, 'index'])->name('items.index');
Route::get('items/search', [ItemController::class, 'search'])->name('items.search');
Route::get('items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
Route::get('faqs/{faq}', [FaqController::class, 'show'])->name('faqs.show');
Route::get('events', [EventController::class, 'index'])->name('events.index');
Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard and Profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');
    


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User-specific Routes
    Route::resource('carts', CartController::class)->except(['create', 'edit', 'destroy']);
    Route::resource('orders', OrderController::class)->only(['index', 'store', 'show']);
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::resources([
        'banners' => BannerController::class,
        'categories' => CategoryController::class,
        'subcategories' => SubCategoryController::class,
        'artists' => ArtistController::class,
        'items' => ItemController::class,
        'item-details' => ItemDetailController::class,
        'suppliers' => SupplierController::class,
        'order-items' => OrderItemController::class,
    ], ['except' => ['index', 'show']]);
    
    Route::resource('events', EventController::class)->except(['index', 'show']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard and Profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
