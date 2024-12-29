<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;



Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('borrowings', BorrowingController::class);

Route::get('/', [BookController::class, 'index']);