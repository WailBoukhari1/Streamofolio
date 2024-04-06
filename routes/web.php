<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;





Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/affiliates', [MainController::class, 'affiliates'])->name('affiliates');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/single-product/{id}', [MainController::class, 'singleProduct'])->name('single-product');
Route::get('/stream', [MainController::class, 'stream'])->name('stream');
Route::get('/donate', [MainController::class, 'donate'])->name('donate');


Route::middleware(['auth.verify', 'client'])->group(function () {
    Route::get('/account-info', [MainController::class, 'accountInfo'])->name('account-info');
    Route::get('/account-orders', [MainController::class, 'accountOrders'])->name('account-orders');
    Route::get('/account-shipping', [MainController::class, 'accountShipping'])->name('account-shipping');
    Route::post('/shipping', [ShippingController::class, 'store'])->name('store.shipping');
    Route::get('/account', [MainController::class, 'account'])->name('account');
    Route::post('/store-review', [ReviewController::class, 'store'])->name('store.review');
    Route::get('/cart', [MainController::class, 'cart'])->name('cart');
    Route::post('/checkout', [MainController::class, 'checkout'])->name('checkout');
    Route::post('/profile/update', [ClientController::class, 'updateProfile'])->name('profile.update');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::delete('/cart/{key}', [CartController::class, 'delete'])->name('cart.delete');
    Route::put('/cart/{key}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/redeem-coupon', [CartController::class, 'applyCoupon'])->name('redeem.coupon');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
    Route::get('/thank-you', [OrderController::class, 'thankyou'])->name('thankyou');
    Route::delete('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('cancel.order');
    Route::delete('/delete-order/{order}', [OrderController::class, 'deleteOrder'])->name('delete.order');

});


Route::middleware(['auth.verify', 'admin'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
});

// Login route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

// Registration route
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// Logout route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email verification routes
Route::get('/email_verify', [EmailVerificationController::class, 'show'])->middleware(['auth'])->name('verification.notice');
Route::get('/email_verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');
Route::post('/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
