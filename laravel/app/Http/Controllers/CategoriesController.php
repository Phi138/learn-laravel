<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(){
        
    }

    //hiển thị ds chuyên mục (pt get)
    public function index(){
        return view('clients/categories/list');
    }

    //Lấy ra 1 chuyên mục theo id (Phương thức get)
    public function getCategory($id){
        return view('clients/categories/edit');
    }

    //cập nhật 1 chuyên mục (Phương thức post)
    public function updateCategory($id){
        return 'submit sửa chuyên mục: ' . $id;
    }

    //show form thêm dữ liệu (Phương thức get)
    public function addCategory(){
        return view('clients/categories/add');
    }

    //thêm dữ liệu vào chuyên mục (Phương thức post)
    public function handleAddCategory(){
        return redirect(route('categories.add'));
        //return 'Submit thêm chuyên mục';
    }

    //xóa dữ liệu (Phương thức delete)
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục' . $id;
    }

}
