@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container container-gio-hang">
    <h1 class="text-3xl">{{$title}}</h1>
    <p>Bạn có {{$tongSoLuong}} mặt hàng trong giỏ.</p>
    <div class="san-pham">
        <div class="row">
            @foreach($items as $item)
            <div class="col w-1/3">
                <img class="h-[400px]" src="/images/item/{{$item->ds_hinh_anh}}" alt="">
                <h2 class="text-lg">{{$item->ten_sp}}</h2>
                <div class="flex">
                    <p class="line-through">{{number_format($item->gia_sp, 0, ',', '.')}} VND</p>
                    <p class="ml-4 text-primary-100">{{number_format($item->gia_km, 0, ',', '.')}} VND</p>
                </div>
                <p>Size: {{$item->kich_thuoc}}</p>
                <p>Số lượng: {{$item->so_luong}}</p>
                <p>
                    <a onclick="return confirm('Bạn có chắc chắn muốn gỡ?')" href="{{route('muc-gio-hang.delete', ['id'=>$item->id])}}">Gỡ</a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row w-full bg-white pt-15">
        <div class="col w-1/3">
            <p>
                <a class="btn btn-outline-primary" href="{{route('index')}}">TIẾP TỤC MUA HÀNG</a>
            </p>
        </div>
        <div class="col w-1/3 text-center text-base">
            <p class="font-bold">{{number_format($tongTien, 0, ',', '.')}} VND</p>
            <p>Đã bao gồm thuế VAT</p>
        </div>
        <div class="col w-1/3">
            <p>
                @if ($tongSoLuong > 0)
                    <a class="btn btn-primary float-right" href="{{ route('van-chuyen') }}">THANH TOÁN</a>
                @else
                    <a class="btn btn-primary float-right">THANH TOÁN</a>
                @endif
            </p>
        </div>
    </div>
  </div>
</section>
@endsection