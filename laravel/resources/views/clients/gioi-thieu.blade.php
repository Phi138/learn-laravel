@extends('clients.layout')

@section('title', $title)

@section('content')

<section class="mod-video pt-25">
    <div class="container">
        <h1 class="text-center text-3xl mb-20">FOR ELISE - REACH FURTHER</h1>
        <iframe class="w-full h-[185px] md:h-[404px] lg:h-76vh" title="FOR ELISE - REACH FURTHER" src="https://www.youtube.com/embed/W0_1m8PQD5A" width="1280" height="720" frameborder="0" allowfullscreen=""></iframe>
    </div>
</section>

@endsection

@if(Session::has('ten_nguoi_dung') && session('flag') == 1)
  <?php Session::put('flag', 0); ?>
  <script>alert("Đăng nhập thành công!");</script>
@endif