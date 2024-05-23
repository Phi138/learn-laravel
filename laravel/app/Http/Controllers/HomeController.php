<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class HomeController extends Controller
{
    public function index () {
        $title = 'ELISE - ĐỊNH HƯỚNG PHONG CÁCH THỜI TRANG';

        $sanPham = new SanPham();

        $sanPhams = $sanPham->getAllSanPhams1();

        if($key = request()->key) {
            $sanPhams = $sanPham->search($key);
        }
        
        return view('clients.index', compact('title', 'sanPhams', 'key'));
    }

    public function detail ($id) {
        $sanPham = new SanPham();
        $sanPhamDetail = $sanPham->getDetail($id);
        $sanPhamDetail = $sanPhamDetail[0];
        $title = $sanPhamDetail->ten_sp;
        // Lưu URL hiện tại vào session
        session(['previous_url' => url()->current()]);
        return view('clients.xem-chi-tiet', compact('title', 'sanPhamDetail'));
    }

    public function gioHang () {
        $title = 'THÔNG TIN GIỎ HÀNG';
        return view('clients.gio-hang', compact('title'));
    }

    public function vanChuyen () {
        $title = 'ĐỊA CHỈ GIAO HÀNG';
        return view('clients.van-chuyen', compact('title'));
    }
}
