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
        if(!empty($id)){
            $sanPhamDetail = $this->mucGioHang->getDetail($id);
            if(!empty($sanPhamDetail[0])){
                $deleteStatus = $this->mucGioHang->deleteSanPham($id);
                if ($deleteStatus){
                    $msg = 'Xóa sản phẩm thành công';
                } else {
                    $msg = 'Bạn không thể xóa sản phẩm lúc này. Vui lòng thử lại sau!';
                }
            } else {
                $msg = 'Sản phẩm không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('gio-hang')->with('msg', $msg);
    }

    public function getCartItems()
    {
        $title = 'THÔNG TIN GIỎ HÀNG';

        $ten_nguoi_dung = session('ten_nguoi_dung');
        
        $items = MucGioHang::join('san_pham', 'muc_gio_hang.ma_sp', '=', 'san_pham.ma_sp')
            ->select('muc_gio_hang.*', 'san_pham.ten_sp', 'san_pham.gia_sp', 'san_pham.ds_hinh_anh', 'san_pham.gia_km')
            ->where('muc_gio_hang.ten_nguoi_dung', $ten_nguoi_dung)
            ->get();

        $tongSoLuong = $items->sum('so_luong');

        $tongTien = 0;
        foreach ($items as $item) {
            $tongTien += $item['so_luong'] * $item['gia_km'];
        }

        return view('clients.gio-hang', compact('items', 'title', 'tongSoLuong', 'tongTien'));
    }
}
