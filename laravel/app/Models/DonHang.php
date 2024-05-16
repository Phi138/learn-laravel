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
}
