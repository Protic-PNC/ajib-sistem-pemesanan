<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Product;
use App\Livewire\Category;
use App\Livewire\TestPage;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompleteDataController;
use App\Livewire\Carts;
use App\Livewire\DetailOrders;
use App\Livewire\Orders;
use App\Livewire\Profile;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('/welcome-ajib');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'check.consumer'])->name('dashboard');

Route::get('/complete-data', [CompleteDataController::class, 'index'])->name('complete-data.index')->middleware('auth');
Route::post('/complete-data', [CompleteDataController::class, 'store'])->name('complete-data.store')->middleware('auth');

Route::middleware(['auth', 'check.consumer'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, 'listProduct']);
    Route::get('/category', [CategoryController::class, 'listCategory'])->name('category.list');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});


Route::get('/category/{slug}', [CategoryController::class, 'showCategory'])->name('category.show');

Route::middleware(['auth', 'check.consumer'])->group(function () {
    // Route::get('/test-page', TestPage::class)->name('test.page');
    Route::get('/home', Category::class)->name('home');
    Route::get('/kategori', Category::class)->name('category');
    Route::get('/produk/{category}', Product::class)->name('product');
    Route::get('/produk/{category}/{product}', ProductDetail::class)->name('product.detail');

    Route::get('/pesanan', Orders::class)->name('orders');
    Route::get('/pesanan/{id}', DetailOrders::class)->name('detail.orders');

    Route::get('/keranjang', Carts::class)->name('carts');
    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('keluar');
});

require __DIR__ . '/auth.php';
