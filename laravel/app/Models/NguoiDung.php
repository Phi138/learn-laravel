<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class NguoiDung extends Model
{
    use HasFactory;
    protected $table = 'nguoi_dung';

    public function addNguoiDung($data){
        DB::insert('INSERT INTO nguoi_dung (ten_nguoi_dung, mat_khau, email, ho_ten, dia_chi, sdt, laAdmin) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)', $data);
    }
}
