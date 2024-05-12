<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MucGioHang;
use Illuminate\Http\Request;

class MucGioHangController extends Controller
{
    private $mucGioHang;
    public function __construct(){
        $this->mucGioHang = new MucGioHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $maSanPham)
    {
        $data = [
            $request->input('soLuong'),
            $request->input('size'),
            $request->session()->get('ten_nguoi_dung'),
            $maSanPham
        ];
        $this->mucGioHang->create($data);

        // Đăng ký thành công, chuyển hướng đến trang đăng nhập hoặc trang khác
        return back()->with('msg', 'Thêm vào giỏ hàng thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ttGioHang() {
        
    }
}
