@extends('clients.layout')

@section('title', $title)

@section('content')
<section class="mod-swiper">
  <div class="container">
    <div class="swiper swiper-1 slider-lazy pb-20">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
        <img fetchpriority="high" class="w-full object-cover object-center" alt="name image"
            src="images/slide/slide-1.jpg">
        </div>
        <div class="swiper-slide">
        <img class="w-full object-cover object-center" alt="name image"
            src="images/slide/slide-2.jpg">
        </div>
        <div class="swiper-slide">
        <img class="w-full object-cover object-center" alt="name image"
            src="images/slide/slide-3.jpg">
        </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    <!-- If we need navigation buttons -->
    <button class="swiper-button-prev"><span class="sr-only">previous slide</span></button>
    <button class="swiper-button-next"><span class="sr-only">Next slide</span></button>
    </div>
  </div>
</section>
<div class="h-30"></div>
<section>
  <div class="container">
    <h2 class="text-center">NEW ARRIVAL</h2>
    <div class="row">
      @foreach($sanPhams as $item)
      <div class="col w-1/4">
        <a class="text-sm" href="">
          <img src="{{$item->ds_hinh_anh}}" alt="">
          <h3 class="text-sm">{{$item->ten_sp}}</h3>
          <div class="flex">
            <p class="line-through">{{number_format($item->gia_sp, 0, ',', '.')}} VND</p>
            <p class="ml-4 text-primary-100">{{number_format($item->gia_km, 0, ',', '.')}} VND</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection