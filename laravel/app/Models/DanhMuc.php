<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_muc';

    //lấy ra tất cả danh mục
    public function getAllSanPhams(){
        $sanPhams = DB::select('SELECT *
                                FROM ' . $this->table . '
                                ORDER BY ma_danh_muc DESC');
        return $sanPhams;
    }

    //thêm danh mục
    public function addSanPham($data){
        DB::insert('INSERT INTO ' . $this->table . ' (ten_danh_muc) 
                    VALUES (?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE ma_danh_muc = ?', [$id]);
    }

    public function updateSanPham($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET ten_danh_muc=? where ma_danh_muc = ?', $data);
    }

    public function deleteSanPham($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE ma_danh_muc=?', [$id]);
    }
}
