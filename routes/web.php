<?php

use App\Http\Controllers\LotController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BetController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, "index"])->name('main-page');

Route::get('/lots/{id}', [PageController::class, "single"])->name('lot-page');
Route::post('/lots/{lotId}', [BetController::class, "placeBet"])->name('lot-place-bet')->middleware('authCheck');
Route::delete('/bets/{betId}', [BetController::class, "deleteBet"])->name('delete-bet')->middleware('authCheck');

Route::get('/lots/category/{id}', [LotController::class, "searchByCategory"])->name('category-search');

Route::get('/search', [LotController::class, "search"])->name('search');

Route::get('/sign-up', [PageController::class, "signup"])->name('signup-page');
Route::post('/sign-up', [UserController::class, "signup"])->name('signup');

Route::get('/login', [PageController::class, "login"])->name('login-page');
Route::post('/login', [UserController::class, "login"])->name('login');

Route::get('/logout', [UserController::class, "logout"])->name('logout')->middleware('authCheck');;

Route::get('/add-lot', [PageController::class, "addLot"])->name('add-lot-page')->middleware('authCheck');
Route::post('/add-lot', [LotController::class, "addLot"])->name('add-lot')->middleware('authCheck');

Route::get('/profile', [PageController::class, "profile"])->name('profile-page')->middleware('authCheck');
