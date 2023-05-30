<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\UserOrderController;
use App\Models\Order;
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

// Ketika pertama kali membuka website mengarah ke file welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

// Jika user telah login maka akan langsung diarahkan ke file dashboard.blade.php dengan url '/dashboard'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User akan dicek apakah login atau tidak
Route::middleware('auth')->group(function () {

    // Mengarah ke halaman users dengan method GET yang mana hanya mengambil data dan dinamakan user.index dari UserController dengan function index untuk memanggil dengan route()
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // Resource merupakan template dari laravel 10 yang mana didalamnya bisa mengakses function index, show, create, store, edit, update, dan delete
    // Route ini mengarah ke halaman spot dengan mengakses semua function resource yang berada pada SpotController
    Route::resource('/spot', SpotController::class);
    // Route ini mengarah ke halaman order dengan mengakses semua function resource yang berada pada OrderController
    Route::resource('/order', OrderController::class);
    // Route ini mengarah ke halaman user-order dengan mengakses semua function resource yang berada pada UserOrderController
    Route::resource('/user-order', UserOrderController::class);

    // Route ini digunakan untuk menampilkan data pada OrderController dengan function paymentPage
    Route::get('/order/detail-payment/{id}', [OrderController::class, 'paymentPage'])->name('order.payment-page');
    // Route ini digunakan untuk memproses data pada OrderController dengan function payment yang mana akan berfungsi pada saat melakukan pembayaran
    Route::post('/order/payment', [OrderController::class, 'payment'])->name('order.payment');
});

require __DIR__.'/auth.php';
