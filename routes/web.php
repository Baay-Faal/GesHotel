<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChambreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get ('/chambres', [App\Http\Controllers\ChambreController::class, 'index'])
->name('chambres.index');

Route::get ('/chambres/{chambre}', [App\Http\Controllers\ChambreController::class, 'show'])
->name('chambres.show');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'create'])
->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])
->name('contact.store');

Route::view('/about', 'about')
->name('about');

require __DIR__.'/auth.php';
