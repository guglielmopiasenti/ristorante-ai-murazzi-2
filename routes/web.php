<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        $user = Auth::user();

        if (!$user) {
            return abort(404);
        }

        return view('welcome');
    } else {
        return view('welcome');
    }
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// routes for Admin
Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    // routes for dishes
    Route::get('/dishes/trash', [DishController::class, 'trash'])->name('dishes.trash');
    Route::delete('/dishes/trash/{id}/drop', [DishController::class, 'drop'])->name('dishes.drop');
    Route::delete('/dishes/trash/drop', [DishController::class, 'dropAll'])->name('dishes.dropAll');
    Route::patch('/dishes/{id}/restore', [DishController::class, 'restore'])->name('dishes.restore');
    Route::resource('/dishes', DishController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
