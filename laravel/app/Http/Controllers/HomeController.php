<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class HomeController extends Controller
{
    public function index () {
        $title = 'ELISE - ĐỊNH HƯỚNG PHONG CÁCH THỜI TRANG';

        $sanPham = new SanPham();

        $sanPhams = $sanPham->getAllSanPhams();
        
        return view('clients.index', compact('title', 'sanPhams'));
    }

    public function detail ($id) {
        $sanPham = new SanPham();
        $sanPhamDetail = $sanPham->getDetail($id);
        $sanPhamDetail = $sanPhamDetail[0];
        $title = $sanPhamDetail->ten_sp;
        return view('clients.xem-chi-tiet', compact('title', 'sanPhamDetail'));
    }
}
