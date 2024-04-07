<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $html = '<h1>Hoc lập trình tại unicode</h1>';
    return $html;
});

Route::get('unicode', function(){
    return view('form');
    // return 'phương thức get của path /unicode';
});

Route::post('unicode', function(){
    return 'phương thức post của path /unicode';
});

Route::put('unicode', function(){
    return 'phương thức put của path /unicode';
});