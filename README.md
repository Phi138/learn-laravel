# learn-laravel
1. Cài đặt laravel
- composer create-project laravel/laravel tên-dự-án (chạy bằng terminal)
- C1: mở terminal tại thư mục public gõ: php -S localhost:9999 (thay cổng 9999 thành gì cũng dc)
  C2: mở terminal tại thư mục chính (tên-dự-án) gõ: php artisan serve

Tạo middleware: php artisan make:middleware CheckPermission

Tạo controller: php artisan make:controller CategoriesController
  php artisan make:controller CategoriesController Admin/ProductController --resource