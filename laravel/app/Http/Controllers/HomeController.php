<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class HomeController extends Controller
{
    public $data = [];
    public function index () {
        $title = 'ELISE - ĐỊNH HƯỚNG PHONG CÁCH THỜI TRANG';

        $sanPham = new SanPham();

        $sanPhams = $sanPham->getAllSanPhams();
        
        return view('clients.index', compact('title', 'sanPhams'));
    }
}
