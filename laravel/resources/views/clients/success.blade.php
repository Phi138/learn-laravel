@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container container-gio-hang">
    <div class="row">
        <div class="col w-60p">
            <h1 class="text-3xl">CẢM ƠN, {{$tenNguoiDung}}!</h1>
            <p>Đơn hàng số DH000000{{$maDonHang}} đã được tạo thành công.</p>
        </div>
    </div>
    <p>
        <a href="{{route('index')}}" class="btn btn-primary">VỀ TRANG CHỦ</a>
    </p>
  </div>
</section>
@endsection