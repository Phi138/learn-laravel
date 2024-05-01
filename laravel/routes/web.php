<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

//client routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/xem-chi-tiet/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/gio-hang', [HomeController::class, 'gioHang'])->name('gio-hang');
Route::get('/van-chuyen', [HomeController::class, 'vanChuyen'])->name('van-chuyen');

Route::get('/dang-ky-dang-nhap', function(){
    return view('dang-ky-dang-nhap');
});
Route::post('/dang-ky-dang-nhap', [AuthController::class, 'login'])->name('login');

//Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Route::resource('products', ProductController::class)->middleware('auth.admin.product');

    //san-pham
    Route::prefix('san-pham')->name('san-pham.')->group(function(){
        Route::get('/', [SanPhamController::class, 'index'])->name('index');
        Route::get('/them', [SanPhamController::class, 'create'])->name('create');
        Route::post('/them', [SanPhamController::class, 'store'])->name('store');
        Route::get('/sua/{id}', [SanPhamController::class, 'edit'])->name('edit');
        Route::post('/update', [SanPhamController::class, 'update'])->name('update');
        Route::get('/xoa/{id}', [SanPhamController::class, 'destroy'])->name('delete');
    });
});