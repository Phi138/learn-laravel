<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
          alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><b>{{ session('ten_nguoi_dung') }}</b></p>
          <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
        </div>
      </div>
      <hr>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/admin"><i class='app-menu__icon bx bx-tachometer'></i><span
              class="app-menu__label">Bảng điều khiển</span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-user-voice'></i><span
              class="app-menu__label">Quản lý người dùng</span></a></li>
        <li><a class="app-menu__item" href="{{route('san-pham.index')}}"><i
              class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
        </li>
        <li><a class="app-menu__item" href="{{route('don-hang.index')}}"><i class='app-menu__icon bx bx-task'></i><span
              class="app-menu__label">Quản lý đơn hàng</span></a></li>
        <li>
          <a class="app-menu__item" href="{{route('danh-muc.index')}}"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý danh mục</span></a>
        </li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
              đặt hệ thống</span></a></li>
    </ul>
</aside>

<script>
    // Lấy tất cả các phần tử <a> trong menu
    const menuLinks = document.querySelectorAll('.app-menu__item');

    // Hàm để xác định phần tử <a> đang được active
    function setActiveLink() {
    // Lấy URL hiện tại của trang
    const currentUrl = window.location.href;

    // Lặp qua các phần tử <a> và kiểm tra xem link có khớp với URL hiện tại không
    menuLinks.forEach(link => {
        if (link.href === currentUrl) {
        // Thêm class "active" cho phần tử <a> khớp
        link.classList.add('active');
        } else {
        // Xóa class "active" từ các phần tử <a> khác
        link.classList.remove('active');
        }
    });
    }

    // Gọi hàm setActiveLink() khi trang được tải
    window.addEventListener('load', setActiveLink);

    // Thêm sự kiện click cho các phần tử <a>
    menuLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        // Cập nhật URL của trình duyệt
        window.history.pushState({}, '', event.currentTarget.href);

        // Gọi hàm setActiveLink() để cập nhật class "active"
        setActiveLink();
    });
    });
</script>