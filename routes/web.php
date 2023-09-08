<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Token;

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// crete token
Route::post('/tokens/create', function (Request $request) {

    try{
        $request->validate([
            'token_name' => 'required',
        ]);

        $token = $request->user()->createToken($request->token_name);

        Token::create([
            'user_id' => $request->user()->id,
            'token' => $token->plainTextToken,
        ]);

        return redirect()->back()->with('status', 'Token Created!');

    }catch(\Exception $e){
        return redirect()->back()->with('status', $e->getMessage());
    }
})->name('token.create');
