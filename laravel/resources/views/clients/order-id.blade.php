@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    <h1 class="text-3xl">{{$title}}</h1>
    @foreach ($orderDetails as $madonhang => $orderDetail)
    <div class="card mb-30">
        <div class="card-header mb-10 font-bold">
            Mã đơn hàng #{{ $madonhang }}: {{$orderDetail[0]->trang_thai}}
        </div>
        <div class="card-header mb-10 font-bold">
          Ngày đặt hàng: {{ date('d-m-Y H:i', strtotime($orderDetail[0]->ngay_dat_hang)) }}
        </div>
        @foreach ($orderDetail as $item)
        <div class="row mb-8">
          <div class="col w-8p">
            <img src="images/item/{{$item->ds_hinh_anh}}" alt="">
          </div>
          <div class="col w-35p">
            <h3 class="text-lg">{{$item->ten_sp}}</h3>
            <p class="text-base mb-4">Số lượng: {{$item->so_luong}}</p>
            <p class="text-base mb-4">Size: {{$item->kich_thuoc}}</p>
          </div>
          <div class="col w-57p">
            <p class="ml-4">{{number_format($item->gia_km, 0, ',', '.')}} VND</p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col w-1/2">
          <h3 class="text-xl">ĐỊA CHỈ GIAO HÀNG</h3>
          <p>{{$orderDetail[0]->ho_ten}}</p>
          <p>{{$orderDetail[0]->dia_chi_giao_hang}}</p>
          <p>{{$orderDetail[0]->sdt}}</p>
        </div>
        <div class="col w-1/2">
          <h3 class="text-xl">CHI TIẾT THANH TOÁN</h3>
          <div class="row">
            <div class="col w-1/2">
              <p>{{ $orderTotalQuantities[$madonhang] }} sản phẩm</p>
              <p>Vận chuyển</p>
              <p>Tổng</p>
            </div>
            <div class="col w-1/2">
              <p>{{ number_format($tongTiens[$madonhang], 0, ',', '.') }} VND</p>
              <p>30.000 VND</p>
            <p>{{ number_format($orderDetail[0]->tong_tien, 0, ',', '.') }} VND</p>
          </div>
        </div>
        <h3 class="text-xl">PHƯƠNG THỨC THANH TOÁN</h3>
        <p>{{$orderDetail[0]->pttt}}</p>
      </div>
    </div>
    <div class="w-full h-[1px] bg-black my-15"></div>
    @endforeach
    <p>
        <a href="{{route('index')}}" class="btn btn-primary">VỀ TRANG CHỦ</a>
    </p>
  </div>
</section>
@endsection