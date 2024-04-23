<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        //echo 'khởi động';
        // sử dụng session để check login
    }

    public function index(){
        return view('admin.index');
    }
}
