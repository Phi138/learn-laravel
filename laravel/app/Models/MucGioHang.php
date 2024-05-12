<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class MucGioHang extends Model
{
    use HasFactory;
    protected $table = 'muc_gio_hang';
    public function create($data){
        DB::insert('INSERT INTO ' .$this->table. ' (so_luong, kich_thuoc, ten_nguoi_dung, ma_sp) 
                    VALUES (?, ?, ?, ?)', $data);
    }

    public function ttGioHang(){
        $sanPhams = DB::select('SELECT sp.*, dm.ten_danh_muc 
                                FROM san_pham sp 
                                JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc 
                                ORDER BY sp.ngay_tao DESC');

        return $sanPhams;
    }
}
