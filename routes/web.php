<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('product', ProductController::class);

Route::resource('gallery', GalleryController::class);
Route::get('/product/{id}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');

Route::resource('transaction', TransactionController::class);
Route::get('/transaction/{id}/status', [TransactionController::class, 'status'])->name('transaction.status');

require __DIR__.'/auth.php';


