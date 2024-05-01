<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $tenNguoiDung = $request->input('ten_nguoi_dung');
        $matKhau = $request->input('mat_khau');

        $nguoiDung = NguoiDung::where('ten_nguoi_dung', $tenNguoiDung)->first();

        if ($nguoiDung && Hash::check($matKhau, $nguoiDung->mat_khau)) {
            // Đăng nhập thành công, chuyển hướng đến trang index
            return redirect()->route('index');
        } else {
            // Đăng nhập không thành công, chuyển hướng đến trang đăng nhập lại hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('msg', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }
}