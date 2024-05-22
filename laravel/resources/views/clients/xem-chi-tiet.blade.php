@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    @if (session('msg'))
        <div class="alert alert-success text-center mb-15">{{session('msg')}}</div>
    @endif
    <div class="row">
        <div class="col w-1/2">
            <img src="/images/item/{{$sanPhamDetail->ds_hinh_anh}}" alt="">
        </div>
        <div class="col w-1/2">
            <h1 class="text-h1">{{$sanPhamDetail->ten_sp}}</h1>
            <div class="flex">
                <p class="line-through text-xl mb-0">{{number_format($sanPhamDetail->gia_sp, 0, ',', '.')}} VND</p>
                <p class="ml-4 text-primary-100 text-xl mb-0">{{number_format($sanPhamDetail->gia_km, 0, ',', '.')}} VND</p>
            </div>
            <form action="{{route('muc-gio-hang.store', ['maSanPham' => $sanPhamDetail->ma_sp])}}" method="POST">
                @csrf
                <div class="flex text-sm items-center h-30">
                    <p class="mb-0 mr-28">Kích cỡ</p>
                    <select id="sizeSelect" class="mx-8 font-bold" name="size">
                        @foreach(explode(',', $sanPhamDetail->ds_kich_thuoc) as $kichThuoc)
                            <option value="{{$kichThuoc}}">{{$kichThuoc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex">
                    <p class="text-base mr-30">Số lượng</p>
                    <div class="control">
                        <span class="edit-qty minus" onclick="if (!window.__cfRLUnblockHandlers) return false; minusQty('qty')"><i class="fal fa-minus"></i></span>
                        <input type="number" name="soLuong" id="soLuong" maxlength="12" value="1" title="Qty" class="input-text qty" min="1" max="{{$sanPhamDetail->so_luong}}">
                        <span class="edit-qty plus" onclick="if (!window.__cfRLUnblockHandlers) return false; plusQty('qty')"><i class="fal fa-plus"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">THÊM VÀO GIỎ</button>
            </form>
            <p>
                <a href="" class="btn">HƯỚNG DẪN MUA HÀNG</a>
            </p>
            <p>
                <a href="" class="btn">HƯỚNG DẪN CHỌN KÍCH CỠ</a>
            </p>
        </div>
    </div>
  </div>
</section>
@endsection