<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DanhMuc;

class SanPhamController extends Controller
{
    private $sanPham;
    private $danhMuc;
    public function __construct(){
        $this->sanPham = new SanPham();
        $this->danhMuc = new DanhMuc();
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
        $danhMucs = $this->danhMuc->getAllSanPhams();
        return view('admin.san-pham.sua', compact('title', 'sanPhamDetail', 'danhMucs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = session('id');
        $sanPhamDetail = $this->sanPham->getDetail($id);

        if($request->has('ds_hinh_anh')){
            $file = $request->ds_hinh_anh;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('images/item'), $fileName);
            $request->merge(['image' => $fileName]);
        } else {
            $request->merge(['image' => $sanPhamDetail[0]->ds_hinh_anh]);
        }
         
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request->validate([
            'ten_sp' => 'required|min:5',
        ], [
            'ten_sp.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'ten_sp.min' => 'Tên sản phẩm phải từ :min ký tự trở lên',
        ]);
        $data = [
            $request->ten_sp,
            $request->mo_ta_sp,
            $request->gia_sp,
            $request->image,
            $request->so_luong,
            date('Y-m-d H:i:s'),
            'admin',
            $request->ds_kich_thuoc,
            $request->gia_km,
            $request->ma_danh_muc
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

    //hiển thị sản phẩm đầm ra view
    public function getDamSanPhams()
    {
        $title = 'Đầm';

        $sanPhams = $this->sanPham->getDamSanPhams();
        return view('clients.ao', compact('title', 'sanPhams'));
    }

    //hiển thị sản phẩm áo ra view
    public function getAoSanPhams()
    {
        $title = 'Áo';

        $sanPhams = $this->sanPham->getAoSanPhams();
        return view('clients.ao', compact('title', 'sanPhams'));
    }

    //hiển thị sản phẩm quần ra view
    public function getQuanSanPhams()
    {
        $title = 'Quần';

        $sanPhams = $this->sanPham->getQuanSanPhams();
        return view('clients.ao', compact('title', 'sanPhams'));
    }

    //hiển thị sản phẩm chân váy ra view
    public function getChanVaySanPhams()
    {
        $title = 'Chân váy';

        $sanPhams = $this->sanPham->getChanVaySanPhams();
        return view('clients.ao', compact('title', 'sanPhams'));
    }
}
