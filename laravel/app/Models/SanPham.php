<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class SanPham extends Model
{
    use HasFactory;
    public function getAllSanPhams(){
        $sanPhams = DB::select('SELECT sp.*, dm.ten_danh_muc 
                                FROM san_pham sp 
                                JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc 
                                ORDER BY sp.ngay_tao DESC');

        return $sanPhams;
    }

    public function addSanPham($data){
        DB::insert('INSERT INTO san_pham (ma_danh_muc, ten_sp, mo_ta_sp, gia_sp, ds_hinh_anh, so_luong, ngay_tao, nguoi_tao, ngay_cap_nhat, nguoi_cap_nhat, ds_kich_thuoc, gia_km) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }
}
