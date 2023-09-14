<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['check.token'])->group(function () {

    Route::get('/user', function (Request $request) {
        $user = User::get();

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    });
});
