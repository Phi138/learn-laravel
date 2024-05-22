<ul class="app-menu">
    <li><a class="app-menu__item" href="/admin"><i class='app-menu__icon bx bx-tachometer'></i><span
          class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-id-card'></i> <span
          class="app-menu__label">Quản lý nhân viên</span></a></li>
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-user-voice'></i><span
          class="app-menu__label">Quản lý khách hàng</span></a></li>
    <li><a class="app-menu__item" href="{{route('san-pham.index')}}"><i
          class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
    </li>
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-task'></i><span
          class="app-menu__label">Quản lý đơn hàng</span></a></li>
    <li>
      <a class="app-menu__item" href="{{route('danh-muc.index')}}"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý danh mục</span></a>
    </li>
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
          đặt hệ thống</span></a></li>
</ul>

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