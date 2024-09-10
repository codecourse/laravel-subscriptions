<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProtectedController;
use App\Http\Middleware\RedirectIfNotSubscribed;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/plans', [PlanController::class, 'index'])
    ->name('plans');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::get('/protected', [ProtectedController::class, 'index'])
    ->middleware([RedirectIfNotSubscribed::class])
    ->name('protected');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
