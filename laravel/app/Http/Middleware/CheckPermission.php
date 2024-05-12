<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$this->isLogin()){
            return redirect(route('dang-ky-dang-nhap'));
        }
        return $next($request);
    }

    public function isLogin(){
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        return session()->has('ten_nguoi_dung');
    }
}
