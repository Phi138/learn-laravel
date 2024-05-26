<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\CTDonHang;
use App\Models\MucGioHang;
use Carbon\Carbon;

class DonHangController extends Controller
{
    private $donHang;
    private $orderDetail;
    private $mucGioHang;
    public function __construct(){
        $this->donHang = new DonHang();
        $this->orderDetail = new CTDonHang();
        $this->mucGioHang = new MucGioHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách đơn hàng';

        $sanPhams = $this->donHang->getAllSanPhams();
        return view('admin.don-hang.index', compact('title', 'sanPhams'));
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
    public function edit(Request $request ,string $id)
    {
        $title = 'Cập nhật trạng thái đơn hàng';
        if(!empty($id)){
            $sanPhamDetail = $this->donHang->getDetail($id);
            if(!empty($sanPhamDetail[0])){
                $request->session()->put('id', $id);
                $sanPhamDetail = $sanPhamDetail[0];
            } else {
                return redirect()->route('don-hang.index')->with('msg', 'Đơn hàng không tồn tại');
            }
        } else {
            return redirect()->route('don-hang.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('admin.don-hang.sua', compact('title', 'sanPhamDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $data = [
            $request->order_status
        ];
        $this->donHang->updateSanPham($data, $id);
        return back()->with('msg','Cập nhật trạng thái thành công');
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

        //lấy ra các sản phẩm trong mục giỏ hàng
        $items = MucGioHang::join('san_pham', 'muc_gio_hang.ma_sp', '=', 'san_pham.ma_sp')
        ->select('muc_gio_hang.*')
        ->where('muc_gio_hang.ten_nguoi_dung', $tenNguoiDung)
        ->get();

        //xử lý lưu các mục giỏ hàng vào ct đơn hàng
        foreach ($items as $item) {
            $orderDetailData = [
                $item->ma_sp,
                $maDonHang,
                $item->so_luong,
                $item->kich_thuoc,
            ];
            $this->orderDetail->createClient($orderDetailData);
        }

        //xóa các sản phẩm trong mục giỏ hàng có tên người dùng = với session tên người dùng
        $this->mucGioHang->deleteAllByUser($tenNguoiDung);

        // Redirect hoặc trả về response tùy theo logic của ứng dụng
        return view('clients.success', compact('tenNguoiDung', 'title', 'maDonHang'));
    }
}
