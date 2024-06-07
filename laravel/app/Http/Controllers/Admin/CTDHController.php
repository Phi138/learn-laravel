<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CTDonHang;


class CTDHController extends Controller
{
    private $ctDonHang;
    public function __construct(){
        $this->ctDonHang = new CTDonHang();
    }

    // hiển thị chi tiết đơn hàng
    public function showOrderDetails()
    {
        $title = 'THÔNG TIN SẢN PHẨM';
        $tenNguoiDung = session('ten_nguoi_dung');

        // Lấy thông tin đơn hàng của người dùng từ model
        $customerOrders = $this->ctDonHang->getCustomerOrders($tenNguoiDung);

        // Khởi tạo mảng để lưu trữ thông tin chi tiết các đơn hàng
        $orderDetails = [];

        // Duyệt qua từng đơn hàng
        foreach ($customerOrders as $order) {
            $orderDetails[$order->ma_don_hang] = $this->ctDonHang->getOrderDetails($order->ma_don_hang);

            // Tính tổng số lượng mặt hàng và tổng tiền của từng đơn hàng
            $totalQuantity = 0;
            $tongTien = 0;
            foreach ($orderDetails[$order->ma_don_hang] as $item) {
                $totalQuantity += $item->so_luong;
                $tongTien += $item->gia_km * $item->so_luong;
            }
            $orderTotalQuantities[$order->ma_don_hang] = $totalQuantity;
            $tongTiens[$order->ma_don_hang] = $tongTien;
        }

        // Trả về dữ liệu cho view
        if (!$customerOrders->isEmpty()) {
            return view('clients.order-id', compact('title', 'orderDetails', 'orderTotalQuantities', 'tongTiens'));
        }
        else {
            $title = 'Bạn chưa có đơn hàng nào';
            return view('clients.don-hang', compact('title'));
        }
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

    //chi tiết đơn hàng ở admin
    public function xem(string $id) {
        $title = 'THÔNG TIN SẢN PHẨM';
        
        $orderDetails = $this->ctDonHang->getOrderDetails($id);
        // dd($orderDetail);
        // Trả về dữ liệu cho view
        return view('admin.don-hang.xem', compact('title', 'orderDetails'));
    }
}
