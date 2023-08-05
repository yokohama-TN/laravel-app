<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;
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

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('users', UsersController::class)
->only(['index'])
->middleware(['auth', 'verified']);

Route::resource('follower', FollowsController::class)
->only(['index'])
->middleware(['auth', 'verified']);

Route::post('follow/{user}', [UsersController::class, 'follow'])->name('follow');
Route::post('unfollow/{user}', [UsersController::class, 'unfollow'])->name('unfollow');

require __DIR__ . '/auth.php';
