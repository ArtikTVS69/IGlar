<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Intelephense doesn't find this


/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/
Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');

Route::get('/profile', function(){
    return view('profile');
})->name('profile');


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);


Route::middleware('auth')->group(function () {
    Route::get('/add-post', [PostController::class, 'create'])->name('add.post');

    Route::post('/add-post', [PostController::class, 'store'])->name('store.post');
});
