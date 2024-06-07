<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CTDonHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hang';

    // lưu các sản phẩm trong mục giỏ hàng vào chi tiết đơn hàng
    public function createClient($data){
        DB::insert('INSERT INTO ' .$this->table. ' (ma_sp, ma_don_hang, so_luong, kich_thuoc) 
                    VALUES (?, ?, ?, ?)', $data);
    }

    //lấy ra các đơn hàng của người dùng
    public function getCustomerOrders($ma_nguoi_dung)
    {
        $customerOrders = DB::table('don_hang')
            ->select(
                'ma_don_hang',
                'ngay_dat_hang', 
                'tong_tien'
            )
            ->where('ten_nguoi_dung', $ma_nguoi_dung)
            ->orderByDesc('ma_don_hang')
            ->get();

        return $customerOrders;
    }

    //lấy ra các mặt hàng trong đơn hàng đó
    public function getOrderDetails($ma_don_hang)
    {
        $orderDetails = DB::table('chi_tiet_don_hang')
            ->join('san_pham', 'chi_tiet_don_hang.ma_sp', '=', 'san_pham.ma_sp')
            ->join('don_hang', 'chi_tiet_don_hang.ma_don_hang', '=', 'don_hang.ma_don_hang')
            ->join('nguoi_dung', 'don_hang.ten_nguoi_dung', '=', 'nguoi_dung.ten_nguoi_dung')
            ->select(
                'san_pham.ds_hinh_anh',
                'san_pham.gia_km',
                'san_pham.ten_sp',
                'chi_tiet_don_hang.so_luong',
                'chi_tiet_don_hang.kich_thuoc',
                'nguoi_dung.sdt',
                'nguoi_dung.ho_ten',
                'don_hang.dia_chi_giao_hang',
                'don_hang.pttt',
                'don_hang.tong_tien',
                'don_hang.trang_thai',
                'don_hang.ngay_dat_hang'
            )
            ->where('chi_tiet_don_hang.ma_don_hang', $ma_don_hang)
            ->get();

        return $orderDetails;
    }
}
