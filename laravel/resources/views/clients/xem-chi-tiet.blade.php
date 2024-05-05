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
            <img src="../{{$sanPhamDetail->ds_hinh_anh}}" alt="">
        </div>
        <div class="col w-1/2">
            <h1 class="text-h1">{{$sanPhamDetail->ten_sp}}</h1>
            <div class="flex">
                <p class="line-through text-xl">{{number_format($sanPhamDetail->gia_sp, 0, ',', '.')}} VND</p>
                <p class="ml-4 text-primary-100 text-xl">{{number_format($sanPhamDetail->gia_km, 0, ',', '.')}} VND</p>
            </div>
            <div class="flex text-sm">
                <p class="mr-30">Kích cỡ</p>
                <p class="mx-8 font-bold">S</p>
                <p class="mx-8 font-bold">M</p>
                <p class="mx-8 font-bold">L</p>
                <p class="mx-8 font-bold">XL</p>
            </div>
            <div class="flex">
                <p class="text-base mr-30">Số lượng</p>
                <div class="control">
                    <span class="edit-qty minus" onclick="if (!window.__cfRLUnblockHandlers) return false; minusQty('qty')"><i class="fal fa-minus"></i></span>
                    <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" data-validate="{&quot;required-number&quot;:true,&quot;validate-item-quantity&quot;:{&quot;minAllowed&quot;:1,&quot;maxAllowed&quot;:10000}}">
                    <span class="edit-qty plus" onclick="if (!window.__cfRLUnblockHandlers) return false; plusQty('qty')"><i class="fal fa-plus"></i></span>
                </div>
            </div>
            <div class="row">
                <p class="col">
                    <a href="{{route('muc-gio-hang.store', ['maSanPham' => $sanPhamDetail->ma_sp])}}" class="btn btn-primary">THÊM VÀO GIỎ</a>
                </p>
                <p class="col">
                    <a href="" class="btn btn-outline-primary">THÊM VÀO YÊU THÍCH</a>
                </p>
                <p class="col">
                    <a href="" class="btn btn-outline-primary">MUA NGAY VỚI</a>
                </p>
            </div>
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
<div class="h-30"></div>
<section>
  
</section>
@endsection