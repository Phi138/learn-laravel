<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function(){
    return view('index');
})->name('index');

Route::get('dang-ky-dang-nhap', function(){
    return view('dang-ky-dang-nhap');
})->name('dang-ky-dang-nhap');

//client routes
Route::prefix('categories')->group(function(){

    //danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index']);

    //Lấy chi tiết 1 chuyên mục (áp dụng show form sửa chuyên mục)
    Route::get('edit/{id}', [CategoriesController::class, 'getCategory']);

    //xử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    //hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory']);

    //xử lý thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //xóa thêm chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory']);
});