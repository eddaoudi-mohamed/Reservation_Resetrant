<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ResarvationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'is_Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, "index"])->name('index');
    Route::resource('/menus', MenuController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/resarvations', ResarvationController::class);
});

require __DIR__ . '/auth.php';
