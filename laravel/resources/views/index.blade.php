<!DOCTYPE html>
<html lang="en">
<head>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ELISE - ĐỊNH HƯỚNG PHONG CÁCH THỜI TRANG</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
            <img src="images/logo.svg" class="w-full" alt="TailWind css starter" width="150" height="39" />
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
        Universal
        <span class="icon-arrow-menu absolute top-3 right-0 block"><span
            class="icomoon icon-chevron-down block"></span></span>
      </a>
      <div id="dropdown-menu-1"
        class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full left-0 right-0 lg:bg-gray-200 p-4 lg:opacity-0 down_lg:hidden">
        <div class="container">
          <div class="row">
            <ul class="col list-inline lg:w-1/5 w-full list-none pl-0">
              <li class="mb-0">
                <a href="universal.html">Universal overview</a>
              </li>
            </ul>
            <ul class="col list-inline lg:w-1/5 w-full list-none pl-0">
              <li class="mb-0">
                <a href="#">network deployment</a>
              </li>
            </ul>
            <ul class="col list-inline lg:w-1/5 w-full list-none pl-0">
              <li class="active mb-0">
                <a href="#">Vista by ViewPoint</a>
              </li>
              <li class="mb-0">
                <a href="#">CMiC</a>
              </li>
              <li class="mb-0">
                <a href="#">COINS</a>
              </li>
            </ul>
            <ul class="col list-inline lg:w-1/5 w-full list-none pl-0">
              <li class="mb-0">
                <a href="#">broadband consulting</a>
              </li>
            </ul>
            <ul class="col list-inline lg:w-1/5 w-full list-none pl-0">
              <li class="mb-0">
                <a href="#">broadband consulting</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </li>
    <li class="menu-item mx-5 xl:px-10 mb-7 lg:my-15">
      <a href="page.html" class="main-link">Page</a>
    </li>
    <li class="menu-item has-sub mx-5 relative lg:static xl:px-10 mb-7 lg:my-15">
      <a href="javascript:;" role="button" aria-expanded="false" aria-controls="dropdown-menu-3"
        class="block relative lg:pr-8">
        News
        <span class="icon-arrow-menu absolute top-3 right-0 block"><span
            class="icomoon icon-chevron-down block"></span></span>
      </a>
      <div id="dropdown-menu-3"
        class="dropdown-menu main-menu-dropdown rounded-0 border-0 lg:absolute top-full lg:bg-gray-200 p-8 lg:opacity-0 down_lg:hidden">
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
      <a target="_blank" href="https://tailwindui.html.box.9thwonder.digital/" class="main-link">Components</a>
    </li>
    <li class="menu-item mx-5 xl:px-10 mb-7 lg:my-15">
      <a href="ADA.html" class="main-link">ADA</a>
    </li>
  </ul>
</nav>
    </div>
  </header>

  <main id="main-content" class="main-content">
    <section>
      <div class="container">
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
        </div>
      </div>
    </section>

    <div class="h-40"></div>

    <section class="mod-swiper">
      <div class="container">
        <h2>Slider with Swiper</h2>
        <div class="swiper swiper-1 slider-lazy pb-20">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <img fetchpriority="high" class="h-50vh w-full object-cover object-center" alt="name image"
                src="https://cdn.agilitycms.com/9th-wonder/MediaGroupings/15/nha-trang-1.jpg">
            </div>
            <div class="swiper-slide">
              <img class="h-50vh w-full object-cover object-center" alt="name image"
                src="https://cdn.agilitycms.com/9th-wonder/MediaGroupings/15/nha-trang-1.jpg">
            </div>
            <div class="swiper-slide">
              <img class="h-50vh w-full object-cover object-center" alt="name image"
                src="https://cdn.agilitycms.com/9th-wonder/MediaGroupings/15/nha-trang-1.jpg">
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
  </main>

  <footer id="footer" class="footer">

  </footer>

</body>
</html>