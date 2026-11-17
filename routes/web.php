<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::post('/order', [HomeController::class, 'storeOrder'])->name('order.store');

// Izinkan kembali halaman register
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/admin/menu', [HomeController::class, 'storeMenu'])->name('admin.menu.store');
    Route::delete('/admin/menu/{id}', [HomeController::class, 'destroyMenu'])->name('admin.menu.destroy');
    Route::patch('/admin/order/{id}', [HomeController::class, 'updateOrderStatus'])->name('admin.order.update');
});