<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    private $sanPham;
    public function __construct(){
        $this->sanPham = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách sản phẩm';

        $sanPhams = $this->sanPham->getAllSanPhams();
        return view('admin.san-pham.index', compact('title', 'sanPhams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm sản phẩm';
        return view('admin.san-pham.them', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_sp' => 'required|min:5',
            // 'email' => 'required|email|unique:sanPham'
        ], [
            'ten_sp.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'ten_sp.min' => 'Tên sản phẩm phải từ :min ký tự trở lên',
            // 'email.required' => 'Email bắt buộc phải nhập',
            // 'email.email' => 'Email không đúng định dạng',
            // 'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);
        $data = [
            '1',
            $request->ten_sp,
            '',
            123456789,
            '',
            60,
            date('Y-m-d H:i:s'),
            '',
            date('Y-m-d H:i:s'),
            '',
            '',
            123456789
        ];
        $this->sanPham->addSanPham($data);

        return redirect()->route('san-pham.index')->with('msg', 'Thêm sản phẩm thành công');
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
        $title = 'Cập nhật sản phẩm';
        if(!empty($id)){
            $sanPhamDetail = $this->sanPham->getDetail($id);
            if(!empty($sanPhamDetail[0])){
                $request->session()->put('id', $id);
                $sanPhamDetail = $sanPhamDetail[0];
            } else {
                return redirect()->route('san-pham.index')->with('msg', 'Sản phẩm không tồn tại');
            }
        } else {
            return redirect()->route('san-pham.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('admin.san-pham.sua', compact('title', 'sanPhamDetail'));
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
        $request->validate([
            'ten_sp' => 'required|min:5',
            // 'email' => 'required|email|unique:sanPham,email,'.$id
        ], [
            'ten_sp.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'ten_sp.min' => 'Tên sản phẩm phải từ :min ký tự trở lên',
            // 'email.required' => 'Email bắt buộc phải nhập',
            // 'email.email' => 'Email không đúng định dạng',
            // 'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);
        $data = [
            $request->ten_sp,
            '',
            123456789,
            '',
            60,
            date('Y-m-d H:i:s'),
            '',
            '',
            123456789
        ];
        $this->sanPham->updateSanPham($data, $id);
        return back()->with('msg','Cập nhật sản phẩm thành công');
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
        return redirect()->route('san-pham.index')->with('msg', $msg);
    }
}