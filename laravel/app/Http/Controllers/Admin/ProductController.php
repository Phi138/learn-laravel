<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        // echo 'products khởi động';
        // sử dụng session để check login
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'danh sách sản phẩm';
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Hiển thị form thêm sản phẩm
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Xử lý thêm sản phẩm (PT post)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    /**
     * Lấy ra thông tin của 1 sản phẩm (PT get)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Hiển thị form sửa sản phẩm (PT get)
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Xử lý sửa sản phẩm (PUT, PATCH)
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * xử lý xóa sản phẩm
     */
    public function destroy(string $id)
    {
        //
    }
}
