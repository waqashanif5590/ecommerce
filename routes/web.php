<?php

use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AllUsers;
use App\Livewire\Admin\ReportsAnalytics;
use App\Livewire\Admin\UserProfile;
use App\Livewire\Index;
use App\Livewire\Shop\Cart;
use App\Livewire\Shop\Categories;
use App\Livewire\Shop\Checkout;
use App\Livewire\Shop\OrderConfirmation;
use App\Livewire\Shop\ProductDetails;
use App\Livewire\Shop\Products;
use App\Livewire\Shop\Wishlist;
use App\Livewire\User\AllOrders;
use App\Livewire\User\OrderDetails;
use App\Livewire\User\UserAddress;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/wishlist', Wishlist::class)->name('wishlist');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/order-confirmation/{order}', OrderConfirmation::class)->name('order.confirmation');

    // User routes
    Route::get('/user-dashboard', UserDashboard::class)->name('user.dashboard');
    Route::get('/all-orders', AllOrders::class)->name('all.orders');
    Route::get('/order-details/{order}', OrderDetails::class)->name('order.details');
    Route::get('/user-address', UserAddress::class)->name('user.address');

    // Admin routes
    Route::get('/admin-dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/reports-analytics', ReportsAnalytics::class)->name('admin.reports');
    Route::get('/admin/all-users', AllUsers::class)->name('all.users');
    Route::get('/user-profile/{customer}', UserProfile::class)->name('user.profile');
});

Route::get('/categories', Categories::class)->name('categories');
Route::get('/', Index::class)->name('/');
Route::get('/products', Products::class)->name('products');
Route::get('/products/{slug}', Products::class)->name('products.category');
Route::get('/product-details/{slug}', ProductDetails::class)->name('product.details');

require __DIR__.'/auth.php';
