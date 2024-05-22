<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_pham'; 

    //lấy ra tất cả sản phẩm
    public function getAllSanPhams(){
        $sanPhams = DB::select('SELECT sp.*, dm.ten_danh_muc 
                                FROM san_pham sp 
                                JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc 
                                ORDER BY sp.ma_sp DESC');

        return $sanPhams;
    }

    public function addSanPham($data){
        DB::insert('INSERT INTO san_pham (ma_danh_muc, ten_sp, mo_ta_sp, gia_sp, ds_hinh_anh, so_luong, ngay_tao, nguoi_tao, ngay_cap_nhat, nguoi_cap_nhat, ds_kich_thuoc, gia_km) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE ma_sp = ?', [$id]);
    }

    public function updateSanPham($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET ten_sp=?, mo_ta_sp=?, gia_sp=?, ds_hinh_anh=?, so_luong=?, ngay_cap_nhat=?, nguoi_cap_nhat=?, ds_kich_thuoc=?, gia_km=?, ma_danh_muc=? where ma_sp = ?', $data);
    }

    public function deleteSanPham($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE ma_sp=?', [$id]);
    }

    //lấy ra các sản phẩm có danh mục là đầm
    public function getDamSanPhams()
    {
        $sanPhams = DB::select('
            SELECT sp.*, dm.ten_danh_muc
            FROM san_pham sp
            JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc
            WHERE dm.ten_danh_muc LIKE :ten_danh_muc
            ORDER BY sp.ma_sp DESC
        ', ['ten_danh_muc' => '%đầm%']);

        return $sanPhams;
    }

    //lấy ra các sản phẩm có danh mục là ao
    public function getAoSanPhams()
    {
        $sanPhams = DB::select('
            SELECT sp.*, dm.ten_danh_muc
            FROM san_pham sp
            JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc
            WHERE dm.ten_danh_muc LIKE :ten_danh_muc
            ORDER BY sp.ma_sp DESC
        ', ['ten_danh_muc' => '%áo%']);

        return $sanPhams;
    }

    //lấy ra các sản phẩm có danh mục là ao
    public function getQuanSanPhams()
    {
        $sanPhams = DB::select('
            SELECT sp.*, dm.ten_danh_muc
            FROM san_pham sp
            JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc
            WHERE dm.ten_danh_muc LIKE :ten_danh_muc
            ORDER BY sp.ma_sp DESC
        ', ['ten_danh_muc' => '%quần%']);

        return $sanPhams;
    }

    //lấy ra các sản phẩm có danh mục là chân váy
    public function getChanVaySanPhams()
    {
        $sanPhams = DB::select('
            SELECT sp.*, dm.ten_danh_muc
            FROM san_pham sp
            JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc
            WHERE dm.ten_danh_muc LIKE :ten_danh_muc
            ORDER BY sp.ma_sp DESC
        ', ['ten_danh_muc' => '%chân váy%']);

        return $sanPhams;
    }

    // tìm kiếm
    public function search($key)
    {
        $sanPhams = DB::select('
            SELECT sp.*, dm.ten_danh_muc
            FROM san_pham sp
            JOIN danh_muc dm ON sp.ma_danh_muc = dm.ma_danh_muc
            WHERE sp.ten_sp LIKE :key
            ORDER BY sp.ma_sp DESC
        ', ['key' => '%' . $key . '%']);

        return $sanPhams;
    }
}
