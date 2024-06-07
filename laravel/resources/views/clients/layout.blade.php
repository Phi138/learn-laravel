<!DOCTYPE html>
<html lang="en">
    <head>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <link rel="icon" type="image/x-icon" href="https://elise.vn/media/favicon/stores/2/favico_192x192.png">
        </head>
    <body>
        <header id="header" class="module header fixed z-50 w-full bg-white py-10 lg:py-0" data-module="header">
            <a href="#main-content"
            class="skip-link text-center opacity-0 absolute mx-auto table left-0 right-0 pointer-events-none"><span>Skip to main
                content</span></a>
            <div class="container navbar navbar-expand-lg lg:flex items-center justify-between">
            <div class="header-mobile row items-center justify-between flex-wrap">
                <div class="col col-9 col-lg-12">
                <a id="header-logo" class="navbar-brand header-logo w-full inline-block align-middle" href="/">
                    <img src="../images/logo.png" class="w-full" alt="TailWind css starter" width="150" height="39" />
                </a>
                </div>
                <div class="col col-3 text-right lg:hidden">
                <button class="border-0 hamburger-menu" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icomoon icon-close hidden"></span>
                    <span class="sr-only">Open Menu</span>
                </button>
                </div>
                </div>
                <nav class="navbar-collapse main-menu" id="main-menu" data-module="menu">
                    <ul class="main-menu-ul navbar-nav ml-auto lg:flex list-none pl-0 mb-0 pt-10 lg:pt-0">
                        <li class="menu-item active has-sub relative lg:static mega-dropdown mx-5 mb-7 xl:px-10 lg:my-15">
                        <a href="javascript:;" role="button" aria-expanded="false" aria-controls="dropdown-menu-1"
                            class="block relative lg:pr-8">
                            THỜI TRANG NỮ
                            <span class="icon-arrow-menu absolute top-3 right-0 block"><span
                                class="icomoon icon-chevron-down block"></span></span>
                        </a>
                        <div id="dropdown-menu-3" class="w-[141px] dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-white p-8 lg:opacity-0 down_lg:hidden">
                            <ul class="list-inline list-none pl-0 mb-0">
                                <li class="">
                                    <a class="block" href="{{route('ao')}}">Áo</a>
                                </li>
                                <li class="">
                                    <a class="block" href="{{route('quan')}}">Quần</a>
                                </li>
                                <li class="">
                                    <a class="block" href="{{route('chan-vay')}}">Chân váy</a>
                                </li>
                                <li class="mb-0">
                                    <a class="block" href="{{route('dam')}}">Đầm</a>
                                </li>
                            </ul>
                        </div>
                        </li>
                        <li class="menu-item has-sub mx-5 relative lg:static xl:px-10 mb-7 lg:my-15">
                        <a href="javascript:;" role="button" aria-expanded="false" aria-controls="dropdown-menu-3"
                            class="block relative lg:pr-8">
                            PHỤ KIỆN
                            <span class="icon-arrow-menu absolute top-3 right-0 block"><span
                                class="icomoon icon-chevron-down block"></span></span>
                        </a>
                        <div id="dropdown-menu-3" class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-white p-8 pb-0 lg:opacity-0 down_lg:hidden">
                            <ul class="list-inline list-none pl-0">
                                <li>
                                    <a class="block" href="{{route('trang-suc')}}">Trang sức</a>
                                </li>
                                <li>
                                    <a class="block" href="{{route('tui')}}">Túi</a>
                                </li>
                                <li class="mb-0">
                                    <a class="block" href="{{route('giay')}}">Giày</a>
                                </li>
                            </ul>
                        </div>
                        </li>
                        <li class="menu-item mx-5 xl:px-10 mb-7 lg:my-15">
                            <a href="{{route('gioi-thieu')}}" class="main-link">Giới thiệu</a>
                        </li>
                        <li class="menu-item mx-5 xl:px-10 mb-7 lg:my-15">
                            <a href="{{route('dang-ky-dang-nhap')}}" class="main-link">
                                <span class="icomoon icon-user mr-4"></span>
                                @if(session('ten_nguoi_dung'))
                                    {{ session('ten_nguoi_dung') }}
                                @else
                                    Tài khoản
                                @endif
                            </a>
                            @if(session('ten_nguoi_dung'))
                            <div id="dropdown-menu-3" class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-white p-8 lg:opacity-0 down_lg:hidden">
                                <ul class="list-inline list-none pl-0 mb-0">
                                    <li class="">
                                        <a href="{{route('order-id')}}">Đơn hàng</a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="{{route('logout')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </li>
                        <li class="menu-item mx-5 xl:px-10 mb-7 lg:my-15">
                            <a href="{{route('gio-hang')}}" class="main-link">
                                <span class="icomoon icon-cart"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main id="main-content" class="main-content pt-45">
            @yield('content')
        </main>

        <footer class="bg-white text-black py-10">
            <div class="bg-black text-white">
                <div class="container">
                    <div class="row text-sm">
                        <div class="col w-full py-8 md:w-1/2 xl:w-1/4">
                            <img class="w-13 mx-auto mb-6" src="/images/footer/return.png" alt="">
                            <p class="text-center font-bold mb-2">7 NGÀY ĐỔI SẢN PHẨM NGUYÊN GIÁ</p>
                            <p class="text-center mb-2">Đổi trả sản phẩm trong 7 ngày</p>
                        </div>
                        <div class="col w-full py-8 md:w-1/2 xl:w-1/4">
                            <img class="w-13 mx-auto mb-6" src="/images/footer/support.png" alt="">
                            <p class="text-center font-bold mb-2">HOTLINE 1900 3060</p>
                            <p class="text-center mb-2">8h00 - 17h00, T2 - T7 (Giờ hành chính)</p>
                        </div>
                        <div class="col w-full py-8 md:w-1/2 xl:w-1/4">
                            <img class="w-13 mx-auto mb-6" src="/images/footer/store.png" alt="">
                            <p class="text-center font-bold mb-2">HỆ THỐNG CỬA HÀNG</p>
                            <p class="text-center mb-2">120 cửa hàng trên toàn hệ thống</p>
                        </div>
                        <div class="col w-full py-8 md:w-1/2 xl:w-1/4">
                            <img class="w-13 mx-auto mb-6" src="/images/footer/shipping.png" alt="">
                            <p class="text-center font-bold mb-2">VẬN CHUYỂN</p>
                            <p class="text-center mb-2">Đồng giá 30k toàn quốc</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-12">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                      <div>
                        <h3 class="text-lg font-bold mb-4">Về Elise</h3>
                        <p class="text-gray-400 mb-4">
                          Elise là thương hiệu thời trang cao cấp tại Việt Nam, chuyên cung cấp các sản phẩm thời trang chất lượng cao.
                        </p>
                      </div>
                      <div>
                        <h3 class="text-lg font-bold mb-4">Liên kết nhanh</h3>
                        <ul class="text-gray-400 space-y-2">
                          <li class="mb-0"><a href="{{route('index')}}">Trang chủ</a></li>
                          <li><a href="#">Sản phẩm</a></li>
                          <li><a href="#">Về chúng tôi</a></li>
                          <li><a href="#">Liên hệ</a></li>
                        </ul>
                      </div>
                      <div>
                        <h3 class="text-lg font-bold mb-4">Địa chỉ</h3>
                        <p class="text-gray-400 mb-4">
                          Phước Tân, Nha Trang, Khánh Hòa
                        </p>
                        <p class="text-gray-400">
                          Điện thoại: 1900 3060
                        </p>
                      </div>
                      <div>
                        <h3 class="text-lg font-bold mb-4">Theo dõi chúng tôi</h3>
                        <div class="flex space-x-4">
                          <a href="#" class="text-gray-400">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                          </a>
                          <a href="#" class="text-gray-400">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                          </a>
                          <a href="#" class="text-gray-400">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63z" clip-rule="evenodd" />
                              <path d="M10.333 12.667a2 2 0 112.667-2.667 2 2 0 01-2.667 2.667zM14.334 8a1.333 1.333 0 110-2.667 1.333 1.333 0 010 2.667z" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="text-center text-sm text-gray-400">
                      &copy; 2024 Elise. Bản quyền thuộc về công ty.
                    </div>
                  </div>
            </div>
        </footer>
    </body>
</html>