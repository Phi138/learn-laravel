<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Danh sách sản phẩm | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    @vite('resources/css/admin/main.css')
    @vite('resources/js/app.js')
  </head>

<body onload="time()" class="app sidebar-mini rtl">
   <!-- Navbar-->
   <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="{{route('index')}}"><i class='bx bx-log-out bx-rotate-180'></i> </a>

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
    @include('admin.app-menu')
  </aside>
    <main class="app-content mt-15">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        @if (session('msg'))
          <div class="alert alert-success">{{session('msg')}}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body overflow-x-auto">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="{{route('san-pham.create')}}" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                          <thead>
                              <tr>
                                  {{-- <th>Mã sản phẩm</th> --}}
                                  <th>Tên sản phẩm</th>
                                  <th>Mô tả sản phẩm</th>
                                  <th>Giá sản phẩm</th>
                                  <th>Giá khuyến mãi</th>
                                  <th>Ảnh</th>
                                  <th>Số lượng</th>
                                  <th>Ngày tạo</th>
                                  <th>Người tạo</th>
                                  <th>Ngày cập nhật</th>
                                  <th>Người cập nhật</th>
                                  <th>Danh sách kích thước</th>
                                  <th>Danh mục</th>
                                  <th>Chức năng</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($sanPhams as $sanPham)
                            <tr>
                              {{-- <td>{{$sanPham->ma_sp}}</td> --}}
                              <td>{{$sanPham->ten_sp}}</td>
                              <td>{{$sanPham->mo_ta_sp}}</td>
                              <td>{{number_format($sanPham->gia_sp, 0, ',', '.')}}</td>
                              <td>{{number_format($sanPham->gia_km, 0, ',', '.')}}</td>
                              <td><img src="/images/item/{{$sanPham->ds_hinh_anh}}" alt="" width="100px;"></td>
                              <td>{{$sanPham->so_luong}}</td>
                              <td>{{$sanPham->ngay_tao}}</td>
                              <td>{{$sanPham->nguoi_tao}}</td>
                              <td>{{$sanPham->ngay_cap_nhat}}</td>
                              <td>{{$sanPham->nguoi_cap_nhat}}</td>
                              <td>{{$sanPham->ds_kich_thuoc}}</td>
                              <td>{{$sanPham->ten_danh_muc}}</td>
                              <td>
                                {{-- <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button> --}}
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('san-pham.delete', ['id'=>$sanPham->ma_sp])}}"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button></a>
                                <a href="{{route('san-pham.edit', ['id'=>$sanPham->ma_sp])}}"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fas fa-edit"></i></button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>