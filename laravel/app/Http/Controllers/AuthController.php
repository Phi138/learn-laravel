<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $tenNguoiDung = $request->input('ten_nguoi_dung');
        $matKhau = $request->input('mat_khau');

        $nguoiDung = NguoiDung::where('ten_nguoi_dung', $tenNguoiDung)->first();

        if ($nguoiDung && Hash::check($matKhau, $nguoiDung->mat_khau)) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            $request->session()->put('ten_nguoi_dung', $tenNguoiDung);
            $laAdmin = $nguoiDung->laAdmin;
            $request->session()->put('laAdmin', $laAdmin);

            if($laAdmin == 0) {
                // Chuyển hướng người dùng đến trang trước đó
                return redirect(session('previous_url'));
            }
            else
                return redirect()->route('admin-index');
        } else {
            // Đăng nhập không thành công, chuyển hướng đến trang đăng nhập lại hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('msg', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}