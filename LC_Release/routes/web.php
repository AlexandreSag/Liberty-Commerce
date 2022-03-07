<?php

use App\Http\Controllers\UploadController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EditUploadController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/admin', function () {
    if (! Gate::allows('accessadmin')) {
        return view('index');
    }

    return view('admin');
})->middleware(['auth'])->name('admin');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
});

Route::get('/catalogue', function () {
    $products = DB::table('products')->get();
    return view('catalogue', compact('products'));
});

Route::get('/cart', function () {
    return view('cart');
});

Route::resource('stocks', StockController::class);

Route::resource('products', ProductController::class);

Route::post('edit_upload', [EditUploadController::class, 'index']);

Route::post('upload', [UploadController::class, 'index']);

Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');

Route::post('cart/add', [CartController::class, 'store']);
Route::delete('cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])->name('cart.increaseQuantity');

Route::post('cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])->name('cart.decreaseQuantity');

Route::post('cart/buy', [OrderController::class, 'buy'])->name('order.buy');

Route::get('status', [UserController::class, 'userOnlineStatus']);