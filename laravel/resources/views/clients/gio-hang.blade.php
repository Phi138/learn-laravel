@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    <h1 class="text-3xl">{{$title}}</h1>
    <p>Bạn có 2 mặt hàng trong giỏ.</p>
    <div class="san-pham">
        <div class="row">
            <div class="col w-1/3">
                <img src="/images/item/item-1.jpg" alt="">
                <h2 class="text-lg">ĐẦM SẠN VÀNG SÁNG CHÂN DẬP LY</h2>
                <div class="flex">
                    <p class="line-through">2.298.000 VND</p>
                    <p class="ml-4 text-primary-100">1.838.400 VND</p>
                </div>
                <p>S</p>
                <p>1</p>
                <p>
                    <a href="#">Gỡ</a>
                </p>
            </div>
            <div class="col w-1/3">
                <img src="/images/item/item-1.jpg" alt="">
                <h2 class="text-lg">ĐẦM SẠN VÀNG SÁNG CHÂN DẬP LY</h2>
                <div class="flex">
                    <p class="line-through">2.298.000 VND</p>
                    <p class="ml-4 text-primary-100">1.838.400 VND</p>
                </div>
                <p>S</p>
                <p>1</p>
                <p>
                    <a href="#">Gỡ</a>
                </p>
            </div>
            <div class="col w-1/3">
                <img src="/images/item/item-1.jpg" alt="">
                <h2 class="text-lg">ĐẦM SẠN VÀNG SÁNG CHÂN DẬP LY</h2>
                <div class="flex">
                    <p class="line-through">2.298.000 VND</p>
                    <p class="ml-4 text-primary-100">1.838.400 VND</p>
                </div>
                <p>S</p>
                <p>1</p>
                <p>
                    <a href="#">Gỡ</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col w-1/3">
            <p>
                <a class="btn btn-outline-primary" href="{{route('index')}}">TIẾP TỤC MUA HÀNG</a>
            </p>
        </div>
        <div class="col w-1/3 text-center text-base">
            <p class="font-bold">Tổng đơn đặt hàng 1.838.400 VND</p>
            <p>Đã bao gồm thuế VAT</p>
        </div>
        <div class="col w-1/3">
            <p>
                <a class="btn btn-primary float-right" href="{{route('van-chuyen')}}">THANH TOÁN</a>
            </p>
        </div>
    </div>
  </div>
</section>
@endsection