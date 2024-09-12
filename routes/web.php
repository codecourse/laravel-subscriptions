<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProtectedController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\RedirectIfCancelled;
use App\Http\Middleware\RedirectIfNotCancelled;
use App\Http\Middleware\RedirectIfNotSubscribed;
use App\Http\Middleware\RedirectIfSubscribed;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/plans', [PlanController::class, 'index'])
    ->middleware([RedirectIfSubscribed::class])
    ->name('plans');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::get('/protected', [ProtectedController::class, 'index'])
    ->middleware(['auth', 'subscribed'])
    ->name('protected');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'subscription'], function () {
    Route::get('/', [SubscriptionController::class, 'index'])->name('subscription');
    Route::get('/portal', [SubscriptionController::class, 'portal'])
        ->middleware([RedirectIfNotSubscribed::class])
        ->name('subscription.portal');

    Route::post('/resume', [SubscriptionController::class, 'resume'])
        ->middleware([RedirectIfNotCancelled::class])
        ->name('subscription.resume');

    Route::post('/cancel', [SubscriptionController::class, 'cancel'])
        ->middleware([RedirectIfCancelled::class])
        ->name('subscription.cancel');

    Route::get('/invoice', [SubscriptionController::class, 'invoice'])
        ->name('subscription.invoice');
})
    ->middleware(['auth']);

require __DIR__.'/auth.php';
