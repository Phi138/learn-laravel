<!DOCTYPE html>
<html lang="en">

<head>
  @section('title', $title)
  <title>@yield('title') | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  {{-- <link rel="stylesheet" type="text/css" href="css/main.css"> --}}
  @vite('resources/css/admin/main.css')
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.html"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item " href="table-data-table.html"><i class='app-menu__icon bx bx-id-card'></i>
          <span class="app-menu__label">Quản lý nhân viên</span></a></li>
      <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item active" href="{{route('san-pham.index')}}"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="table-data-banned.html"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý nội bộ
          </span></a></li>
      <li><a class="app-menu__item" href="table-data-money.html"><i class='app-menu__icon bx bx-dollar'></i><span
            class="app-menu__label">Bảng kê lương</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-bao-cao.html"><i
            class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
      <li><a class="app-menu__item" href="page-calendar.html"><i class='app-menu__icon bx bx-calendar-check'></i><span
            class="app-menu__label">Lịch công tác </span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">@yield('title')</h3>
          <div class="tile-body">

            @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại.</div>
            @endif

            <form class="row" action="" method="POST" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                  <label class="control-label">Tên sản phẩm</label>
                  <input class="form-control" type="text" name="ten_sp" value="{{old('ten_sp')}}" required>
                  @error('ten_sp')
                    <span style="color: red;">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group  col-md-3">
                  <label class="control-label">Số lượng</label>
                  <input class="form-control" type="number" name="so_luong" value="{{old('so_luong')}}" placeholder="Vui lòng nhập số..." required>
              </div>
              <div class="form-group col-md-3">
                  <label for="ma_danh_muc" class="control-label">Danh mục</label>
                  <select class="form-control" name="ma_danh_muc" id="ma_danh_muc">
                    @foreach ($danhMucs as $danhMuc)
                      <option value="{{ $danhMuc->ma_danh_muc }}">
                          {{ $danhMuc->ten_danh_muc }}
                      </option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-3">
                  <label class="control-label">Giá</label>
                  <input class="form-control" type="number" name="gia_sp" value="{{old('gia_sp')}}" placeholder="Vui lòng nhập số..." required>
              </div>
              <div class="form-group col-md-3">
                  <label class="control-label">Giá khuyến mãi</label>
                  <input class="form-control" type="number" name="gia_km" value="{{old('gia_km')}}" placeholder="Vui lòng nhập số..." required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Danh sách size</label>
                <input class="form-control" type="text" name="ds_kich_thuoc" value="{{old('ds_kich_thuoc')}}" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control-file" name="ds_hinh_anh" id="ds_hinh_anh" onchange="previewImage()" required>
                <div id="new-image-preview" style="margin-top: 10px;"></div>
              </div>
              <div class="form-group col-md-12">
                  <label class="control-label">Mô tả sản phẩm</label>
                  <textarea class="form-control" name="mo_ta_sp" id="mo_ta_sp" required>{{old('mo_ta_sp')}}</textarea>
              </div>
              <button class="btn btn-save" type="submit">Lưu lại</button>
              <a class="btn btn-cancel" href="{{route('san-pham.index')}}">Hủy bỏ</a>
              @csrf
          </form>
          </div>
        </div>
  </main>

  <script>
    function previewImage() {
      const file = document.getElementById('ds_hinh_anh').files[0];
      const newImagePreview = document.getElementById('new-image-preview');
      const oldImagePreview = document.getElementById('old-image-preview');

      if (file) {
        console.log(123);
        const reader = new FileReader();
        reader.onload = function(e) {
          // Hiển thị preview của ảnh mới
          newImagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Ảnh sản phẩm mới" style="max-width: 150px;">';
        }
        reader.readAsDataURL(file);
      } else {
        newImagePreview.innerHTML = '';
        oldImagePreview.style.display = 'block'; // Hiển thị lại ảnh cũ
      }
    }
  </script>
</body>
</html>