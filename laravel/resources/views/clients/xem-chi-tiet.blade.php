@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    <div class="row">
        <div class="col">
            <img src="../{{$sanPhamDetail->ds_hinh_anh}}" alt="">
        </div>
        <div class="col">
            <h1>{{$sanPhamDetail->ten_sp}}</h1>
            <div class="flex">
                <p class="line-through">{{number_format($sanPhamDetail->gia_sp, 0, ',', '.')}} VND</p>
                <p class="ml-4 text-primary-100">{{number_format($sanPhamDetail->gia_km, 0, ',', '.')}} VND</p>
            </div>
            <p>Kích cỡ</p>
            <p>Số lượng</p>
            <div class="flex">
                <p>
                    <a href="" class="btn">THÊM VÀO GIỎ</a>
                </p>
                <p>
                    <a href="" class="btn">THÊM VÀO YÊU THÍCH</a>
                </p>
                <p>
                    <a href="" class="btn">MUA NGAY VỚI</a>
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