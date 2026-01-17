<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChambreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ChambreController as AdminChambreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->middleware(['auth', 'verified'])->name('client.dashboard');

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


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Protection simple : seulement admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/chambres',        [AdminChambreController::class, 'index'])->name('chambres.index');
        Route::get('/chambres/create', [AdminChambreController::class, 'create'])->name('chambres.create');
        Route::post('/chambres',       [AdminChambreController::class, 'store'])->name('chambres.store');
        Route::get('/chambres/{chambre}/edit', [AdminChambreController::class, 'edit'])->name('chambres.edit');
        Route::put('/chambres/{chambre}',      [AdminChambreController::class, 'update'])->name('chambres.update');
        Route::delete('/chambres/{chambre}',   [AdminChambreController::class, 'destroy'])->name('chambres.destroy');
    });
});

// Route::get('/client/dashboard', function () {
//     return view('client.dashboard');
// })->middleware(['auth', 'verified'])->name('client.dashboard');


require __DIR__.'/auth.php';
