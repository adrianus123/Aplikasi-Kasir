<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryTransactionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [DashboardController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Product
Route::get('/product', [ProductController::class, 'index']);

// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->middleware('auth');
Route::get('/findProductId', [TransactionController::class, 'findProductId']);
Route::post('/add', [TransactionController::class, 'addProduct']);
Route::get('/delete/{id}', [TransactionController::class, 'deleteProduct']);
Route::get('/deleteAll', [TransactionController::class, 'deleteAllProduct']);
Route::get('/buy/{totalHarga}', [TransactionController::class, 'buyProduct']);

// History Transaction
Route::get('/history', [HistoryTransactionController::class, 'index'])->middleware('auth');
Route::get('/detail/{id}', [HistoryTransactionController::class, 'detailTransaction']);