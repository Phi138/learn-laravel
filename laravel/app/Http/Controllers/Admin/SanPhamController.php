<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    private $sanPham;
    public function __construct(){
        $this->sanPham = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách sản phẩm';

        $sanPhams = $this->sanPham->getAllSanPhams();
        return view('admin.san-pham.index', compact('title', 'sanPhams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.san-pham.them');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_sp' => 'required|min:5',
            // 'email' => 'required|email'
        ], [
            'ten_sp.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'ten_sp.min' => 'Tên sản phẩm phải từ :min ký tự trở lên',
            // 'email.required' => 'Email bắt buộc phải nhập',
            // 'email.email' => 'Email không đúng định dạng'
        ]);
        $data = [
            '1',
            $request->ten_sp,
            '',
            123456789,
            '',
            60,
            date('Y-m-d H:i:s'),
            '',
            date('Y-m-d H:i:s'),
            '',
            '',
            123456789
        ];
        $this->sanPham->addSanPham($data);

        return redirect()->route('san-pham.index')->with('msg', 'Thêm sản phẩm thành công');
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
}
