<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ResarvationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\FrontEnd\CategoryContoller;
use App\Http\Controllers\FrontEnd\MenuController as FrontEndMenuController;
use App\Http\Controllers\FrontEnd\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/categories', [CategoryContoller::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryContoller::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontEndMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [ReservationController::class, 'stepOne'])->name('reservation.step.one');
Route::post('/reservation/step-one/store', [ReservationController::class, 'stepOneStore'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [ReservationController::class, 'stepTwo'])->name('reservation.two');
Route::post('/reservation/step-two/store', [ReservationController::class, 'stepTwoStore'])->name('reservations.store.step.two');



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

Route::get("/", function () {
    $specials = Category::where("name", "specials")->first();
    return view("index", compact("specials"));
})->name('home');


require __DIR__ . '/auth.php';
