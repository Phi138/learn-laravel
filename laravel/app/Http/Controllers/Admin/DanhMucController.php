<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    private $sanPham;
    public function __construct(){
        $this->sanPham = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách danh mục';

        $sanPhams = $this->sanPham->getAllSanPhams();
        return view('admin.danh-muc.index', compact('title', 'sanPhams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm danh mục';
        return view('admin.danh-muc.them', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required',
        ], [
            'ten_danh_muc.required' => 'Tên danh mục bắt buộc phải nhập',
        ]);
        $data = [
            $request->ten_danh_muc
        ];
        $this->sanPham->addSanPham($data);

        return redirect()->route('danh-muc.index')->with('msg', 'Thêm danh mục thành công');
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
    public function edit(Request $request, string $id)
    {
        $title = 'Cập nhật danh mục';
        if(!empty($id)){
            $sanPhamDetail = $this->sanPham->getDetail($id);
            if(!empty($sanPhamDetail[0])){
                $request->session()->put('id', $id);
                $sanPhamDetail = $sanPhamDetail[0];
            } else {
                return redirect()->route('danh-muc.index')->with('msg', 'Danh mục không tồn tại');
            }
        } else {
            return redirect()->route('danh-muc.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('admin.danh-muc.sua', compact('title', 'sanPhamDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $data = [
            $request->ten_danh_muc
        ];
        $this->sanPham->updateSanPham($data, $id);
        return back()->with('msg','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!empty($id)){
            $sanPhamDetail = $this->sanPham->getDetail($id);
            if(!empty($sanPhamDetail[0])){
                $deleteStatus = $this->sanPham->deleteSanPham($id);
                if ($deleteStatus){
                    $msg = 'Xóa sản phẩm thành công';
                } else {
                    $msg = 'Bạn không thể xóa sản phẩm lúc này. Vui lòng thử lại sau!';
                }
            } else {
                $msg = 'Sản phẩm không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('danh-muc.index')->with('msg', $msg);
    }
}
