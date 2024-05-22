<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\NguoiDungController;
use App\Http\Controllers\Admin\MucGioHangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\CTDhController;
use App\Http\Controllers\Admin\DanhMucController;
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

Route::get('/van-chuyen', [MucGioHangController::class, 'thanhToan'])->name('van-chuyen');

//client hiển thị sản phẩm đầm
Route::get('/dam', [SanPhamController::class, 'getDamSanPhams'])->name('dam');

//client hiển thị sản phẩm áo
Route::get('/ao', [SanPhamController::class, 'getAoSanPhams'])->name('ao');

//client hiển thị sản phẩm quần
Route::get('/quan', [SanPhamController::class, 'getQuanSanPhams'])->name('quan');

//client hiển thị sản phẩm chân váy
Route::get('/chan-vay', [SanPhamController::class, 'getChanVaySanPhams'])->name('chan-vay');

//login
Route::get('/dang-ky-dang-nhap', function(){
    return view('dang-ky-dang-nhap');
})->name('dang-ky-dang-nhap');
Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-ky', [NguoiDungController::class, 'store'])->name('user-store');
//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin-index');
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

    // danh mục
    Route::prefix('danh-muc')->name('danh-muc.')->group(function(){
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('/them', [DanhMucController::class, 'create'])->name('create');
        Route::post('/them', [DanhMucController::class, 'store'])->name('store');
        Route::get('/sua/{id}', [DanhMucController::class, 'edit'])->name('edit');
        Route::post('/update', [DanhMucController::class, 'update'])->name('update');
        Route::get('/xoa/{id}', [DanhMucController::class, 'destroy'])->name('delete');
    });
});

//thêm vào giỏ hàng
Route::middleware(['checkpermission'])->group(function () {
    //muc-gio-hang
    Route::any('/muc-gio-hang/{maSanPham}', [MucGioHangController::class, 'store'])->name('muc-gio-hang.store');
    Route::get('/gio-hang', [MucGioHangController::class, 'getCartItems'])->name('gio-hang');
    Route::get('muc-gio-hang/xoa/{id}', [MucGioHangController::class, 'destroy'])->name('muc-gio-hang.delete');

    //thanh toán
    Route::any('/success', [DonHangController::class, 'createClient'])->name('success');

    //hiển thị trang xem đơn hàng
    Route::any('/order-id', [CTDhController::class, 'showOrderDetails'])->name('order-id');
});

Route::get('/check-session', function () {
    // $tenNguoiDung = session('ten_nguoi_dung');
    // if ($tenNguoiDung) {
    //     return "Tên người dùng: " . $tenNguoiDung;
    // } else {
    //     return "Không có tên người dùng trong session.";
    // }
    $url =session('previous_url');
    return $url;
});