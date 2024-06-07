<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Danh sách đơn hàng | Quản trị Admin</title>
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
  @include('admin.app-menu')
    <main class="app-content mt-15">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
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
                        <table class="table table-hover table-bordered" id="sampleTable">
                          <thead>
                              <tr>
                                  <th>Mã đơn hàng</th>
                                  <th>Ngày đặt hàng</th>
                                  <th>Địa chỉ giao hàng</th>
                                  <th>Trạng thái</th>
                                  <th>Ghi chú</th>
                                  <th>Tổng tiền</th>
                                  <th>Người đặt hàng</th>
                                  <th>Phương thức thanh toán</th>
                                  <th>Chức năng</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($sanPhams as $sanPham)
                            <tr>
                              <td>{{$sanPham->ma_don_hang}}</td>
                              <td>{{$sanPham->ngay_dat_hang}}</td>
                              <td>{{$sanPham->dia_chi_giao_hang}}</td>
                              <td>{{$sanPham->trang_thai}}</td>
                              <td>{{$sanPham->ghi_chu}}</td>
                              <td>{{number_format($sanPham->tong_tien, 0, ',', '.')}}</td>
                              <td>{{$sanPham->ten_nguoi_dung}}</td>
                              <td>{{$sanPham->pttt}}</td>
                              <td>
                                <a href="{{route('don-hang.xem', ['id'=>$sanPham->ma_don_hang])}}"><button class="btn btn-add btn-sm edit" type="button" title="Xem"><i class="fa fa-info-circle"></i></button></a>
                                <a href="{{route('don-hang.edit', ['id'=>$sanPham->ma_don_hang])}}"><button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><i class="fas fa-edit"></i></button></a>
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