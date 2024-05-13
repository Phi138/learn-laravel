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

    public function getCartItems($ten_nguoi_dung)
    {
        $items = DB::table('muc_gio_hang')
            ->join('san_pham', 'muc_gio_hang.ma_sp', '=', 'san_pham.ma_sp')
            ->select('gio_hang.*', 'san_pham.*')
            ->where('muc_gio_hang.ten_nguoi_dung', '=', $ten_nguoi_dung)
            ->get();

        return $items;
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }

    public function deleteSanPham($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id=?', [$id]);
    }
}
