<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('home');
});

// Route::get('unicode', function(){
//     return view('form');
//     // return 'phương thức get của path /unicode';
// });

// Route::post('unicode', function(){
//     return 'phương thức post của path /unicode';
// });

// Route::put('unicode', function(){
//     return 'phương thức put của path /unicode';
// });

// Route::delete('unicode', function(){
//     return 'phương thức delete của path /unicode';
// });

// Route::patch('unicode', function(){
//     return 'phương thức patch của path /unicode';
// });

// Route::match(['get', 'post'], 'unicode', function () {
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('unicode', function (Request $request) {
//     return $request->method();
//     //return $_SERVER['REQUEST_METHOD'];
// });

// Route::get('show-form', function () {
//     return view('form');
// });

// // Route::redirect('unicode', 'show-form');

// Route::view('show-form', 'form');

Route::prefix('admin')->group(function () {

    Route::get('tin-tuc/{id?}/{slug?}.html', function ($id=null, $slug=null) {
        $content = 'Phương thức Get của path /unicode với tham số: ';
        $content.='id = '.$id.'<br>';
        $content.='slug = '.$slug;
        return $content;
    })->where('id', '\d+')->where('slug', '.+')->name('admin.tintuc');

    Route::get('unicode', function(){
        return 'phương thức get của path /unicode';
    });
    
    Route::get('show-form', function () {
        return view('form');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });
        Route::get('add', function () {
            return 'Thêm sản phẩm';
        });
        Route::get('edit', function () {
            return 'Sửa sản phẩm';
        });
        Route::get('delete', function () {
            return 'Xóa sản phẩm';
        });
    });
});