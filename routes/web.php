<?php

use App\Http\Controllers\Anime\HomeController;
use App\Http\Controllers\Anime\CharacterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::prefix('anime/')->group(function () {
    Route::get('/', [HomeController::class, 'search'])->name('anime.search');
    Route::get('/trending', [HomeController::class, 'trending'])->name('anime.trending');
    Route::get('/today', [HomeController::class, 'today'])->name('anime.today');
    Route::get('/top', [HomeController::class, 'top'])->name('anime.top');
    Route::get('/upcoming', [HomeController::class, 'upcoming'])->name('anime.upcoming');
    Route::get('details/{id}/{slug}', [HomeController::class, 'detail'])->name('anime.detail');
    Route::get('details/{id}/{slug}/character', [HomeController::class, 'detail_character'])->name('anime.detail.character');
});

Route::prefix('character/')->group(function () {
    Route::get('{id}/{slug}', [CharacterController::class, 'detail'])->name('character.detail');
});
