<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    private $nguoiDung;
    public function __construct(){
        $this->nguoiDung = new NguoiDung();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'ten_nguoi_dung' => 'required',
        //     'mat_khau' => 'required|min:6',
        //     'email' => 'required|email|unique:nguoi_dung',
        // ]);
        $data = [
            $request->ten_nguoi_dung,
            Hash::make($request->mat_khau),
            $request->email,
            '',
            '',
            '',
            0,
        ];
        $this->nguoiDung->addNguoiDung($data);

        // Đăng ký thành công, chuyển hướng đến trang đăng nhập hoặc trang khác
        return redirect()->route('index')->with('msg', 'Đăng ký thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
