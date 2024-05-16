<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use Carbon\Carbon;

class DonHangController extends Controller
{
    private $donHang;
    public function __construct(){
        $this->donHang = new DonHang();
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
    public function store(Request $request)
    {
        //
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

    public function createClient(Request $request)
    {
        // Lấy thông tin từ request
        $diaChiGiaoHang = $request->input('dia_chi_giao_hang');
        $ghiChu = $request->input('ghi_chu');
        $maPt = $request->input('pttt');
        $tongTien = (float) str_replace(['.', ','], ['', '.'], $request->input('tong_tien'));
        
        // Lấy thông tin từ session
        $tenNguoiDung = session('ten_nguoi_dung');
        $title = 'SUCCESS PAGE';
        
        // Tạo một mảng chứa các giá trị để tạo đối tượng DonHang
        $data = [
            Carbon::now(), // Ngày hiện tại
            $diaChiGiaoHang,
            'Chờ xác nhận',
            $ghiChu,
            $tongTien,
            $tenNguoiDung,
            $maPt,
        ];
        
        // Gọi phương thức create từ model DonHang
        $this->donHang->createClient($data);
        
        $maDonHang = $this->donHang->getLatestOrderId();

        // Redirect hoặc trả về response tùy theo logic của ứng dụng
        return view('clients.success', compact('tenNguoiDung', 'title', 'maDonHang'));
    }
}
