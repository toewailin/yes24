<?php

use App\Http\Controllers\Backend\{
    DashboardController,
    AdminArtistController,
    AdminBannerController,
    // AdminCartController,
    AdminCategoryController,
    AdminEventController,
    AdminFaqController,
    AdminOrderController,
    AdminOrderProductController,
    AdminProductController,
    AdminSettingsController,
    AdminSubCategoryController,
    AdminSupplierController,
    AdminUserController
};

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category Routes
    Route::resource('categories', AdminCategoryController::class);

    // Product Routes
    Route::resource('products', AdminProductController::class);

    // Order Routes
    Route::resource('orders', AdminOrderController::class);

    // Order Product Routes
    Route::resource('order-products', AdminOrderProductController::class);

    // User Routes
    Route::resource('users', AdminUserController::class);

    // Settings Routes
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');

    // Artist Routes
    Route::resource('artists', AdminArtistController::class);

    // Banner Routes
    Route::resource('banners', AdminBannerController::class);

    // Cart Routes
    // Route::resource('carts', AdminCartController::class);

    // Event Routes
    Route::resource('events', AdminEventController::class);

    // FAQ Routes
    Route::resource('faqs', AdminFaqController::class);

    // Subcategory Routes
    Route::resource('subcategories', AdminSubCategoryController::class);

    // Supplier Routes
    Route::resource('suppliers', AdminSupplierController::class);

    Route::post('logout', [AdminUserController::class, 'adminLogout'])->name('logout');

    Route::get('/profile', [AdminUserController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile', [AdminUserController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [AdminUserController::class, 'deleteAccount'])->name('profile.destroy');
});
