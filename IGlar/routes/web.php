<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/add-post', [PostController::class, 'create'])->name('add.post');
    Route::post('/add-post', [PostController::class, 'store'])->name('store.post');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/feed', [PostController::class, 'feed'])->name('posts.feed');
    Route::get('/user/{user}/posts', [PostController::class, 'userPosts'])->name('user.posts');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    
    // Like routes
    Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('posts.unlike');
    
    // Follow routes
    Route::post('/user/{user}/follow', [FollowController::class, 'follow'])->name('user.follow');
    Route::delete('/user/{user}/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow');
});
