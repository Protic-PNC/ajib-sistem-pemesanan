<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompleteDataController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'check.consumer'])->name('dashboard');

Route::get('/complete-data', [CompleteDataController::class, 'index'])->name('complete-data.index')->middleware('auth');
Route::post('/complete-data', [CompleteDataController::class, 'store'])->name('complete-data.store')->middleware('auth');

Route::middleware(['auth', 'check.consumer'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product', [ProductController::class, 'listProduct']);
Route::get('/category', [CategoryController::class, 'listCategory']);

require __DIR__ . '/auth.php';
