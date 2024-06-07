<style>
  .mod-swiper-banner {
    height: calc(100vh - 161px);
  }
</style>

@extends('clients.layout')

@section('title', $title)

@section('content')

<section class="mod-search pb-15">
  <form class="flex justify-center items-center gap-5" role="form">
    <div class="form-group border-b-1 border-black">
      <input class="form-control py-4 px-8" type="text" name="key" placeholder="Tìm kiếm..." value="{{$key}}">
    </div>
    <button type="submit" class="">
      <span class="icomoon icon-icon-search"></span>
    </button>
  </form>
</section>

<section class="mod-swiper h-50vh lg:h-fit">
  <div class="mod-swiper-banner">
    <div class="swiper swiper-1 slider-lazy pb-20 h-full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <img fetchpriority="high" class="w-full object-cover object-center h-full" alt="name image"
              src="images/slide/slide-1.jpg">
        </div>
        <div class="swiper-slide">
          <img class="w-full object-cover object-center h-full" alt="name image"
              src="images/slide/slide-2.jpg">
        </div>
        <div class="swiper-slide">
          <img class="w-full object-cover object-center h-full" alt="name image"
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
      <div class="col w-full md:w-1/2 lg:w-1/4">
        <a class="text-sm" href="{{route('detail', ['id'=>$item->ma_sp])}}">
          <img class="w-full object-cover" src="images/item/{{$item->ds_hinh_anh}}" alt="">
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