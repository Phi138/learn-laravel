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
                        <div id="dropdown-menu-3" class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-white p-8 lg:opacity-0 down_lg:hidden">
                            <ul class="list-inline list-none pl-0 mb-0">
                                <li class="">
                                    <a href="{{route('ao')}}">Áo</a>
                                </li>
                                <li class="">
                                    <a href="{{route('quan')}}">Quần</a>
                                </li>
                                <li class="">
                                    <a href="{{route('chan-vay')}}">Chân váy</a>
                                </li>
                                <li class="mb-0">
                                    <a href="{{route('dam')}}">Đầm</a>
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
                        <div id="dropdown-menu-3"
                            class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-white p-8 lg:opacity-0 down_lg:hidden">
                            <ul class="list-inline list-none pl-0">
                            <li>
                                <a href="#">News overview</a>
                            </li>
                            <li>
                                <a href="#">Workshops</a>
                            </li>
                            <li>
                                <a href="#">selection</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">implementation</a>
                            </li>
                            <li class="active">
                                <a href="#">Program Mangement</a>
                            </li>
                            <li>
                                <a href="#">Training</a>
                            </li>
                            </ul>
                        </div>
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

        <footer id="footer" class="footer">

        </footer>
    </body>
</html>