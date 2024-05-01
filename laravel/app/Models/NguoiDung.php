<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'ten_nguoi_dung', 'mat_khau',
    ];

    protected $hidden = [
        'mat_khau', 'remember_token',
    ];
}
