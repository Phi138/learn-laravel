<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hang';
    public function createClient($data){
        DB::insert('INSERT INTO ' .$this->table. ' (ngay_dat_hang, dia_chi_giao_hang, trang_thai, ghi_chu, tong_tien, ten_nguoi_dung, pttt) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function getLatestOrderId()
    {
        $maDonHang = DB::table($this->table)
                        ->orderBy('ngay_dat_hang', 'desc')
                        ->value('ma_don_hang');

        return $maDonHang;
    }

    //lấy ra tất cả đơn hàng
    public function getAllSanPhams(){
        $sanPhams = DB::select('SELECT *
                                FROM ' . $this->table . '
                                ORDER BY ma_don_hang DESC');
        return $sanPhams;
    }

    //chỉnh sửa trạng thái
    public function updateSanPham($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET trang_thai=? where ma_don_hang = ?', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE ma_don_hang = ?', [$id]);
    }
}
