<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//->middleware(['auth', 'verified'])->name('dashboard')
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-kernel', function () {
    return 'HTTP Kernel is working!';
});


//testing kenel middlerware and more 
Route::get('/secure-zone', function () {
    return 'You passed the token check!';
})->middleware('token');

require __DIR__.'/auth.php';
