<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\PermissionController as AdminPermissionController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

/*
|--------------------------------------------------------------------------
| Customer-Facing Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/collections', [ProductController::class, 'index'])->name('collections');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::get('/contact-us', [ContactController::class, 'create'])->name('contact.us');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.us.store');

// Mandatory Policy Pages (Razorpay & Compliance)
Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/shipping-policy', [PageController::class, 'shipping'])->name('shipping.policy');
Route::get('/refund-cancellation-policy', [PageController::class, 'refund'])->name('refund.policy');

// Razorpay Direct Checkout Routes
Route::post('/checkout/razorpay/create-order', [CheckoutController::class, 'createRazorpayOrder'])->name('checkout.razorpay.create');
Route::post('/checkout/direct-order', [CheckoutController::class, 'createRazorpayOrder'])->name('checkout.direct.store');
Route::post('/checkout/razorpay/verify', [CheckoutController::class, 'verifyPayment'])->name('checkout.razorpay.verify');
Route::get('/order-confirmed/{order_number}', [CheckoutController::class, 'orderSuccess'])->name('checkout.success');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('orders', AdminOrderController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('users', AdminUserController::class);
        Route::resource('roles', AdminRoleController::class);
        Route::resource('permissions', AdminPermissionController::class);

        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::match(['POST', 'PUT'], '/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});

