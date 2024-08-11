<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/user', function () {
    return view('dashboard.User.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');
Route::get('/dashboard/admin', function () {
    return view('dashboard.Admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//route::get('/dashboard',[dashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard.user');
require __DIR__.'/auth.php';
