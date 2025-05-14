# Phân tích dự án MetaCoffee - Website bán đồ uống

## 1. Cấu trúc dự án

Dự án được tổ chức theo mô hình MVC (Model-View-Controller), với cấu trúc thư mục như sau:

### Thư mục MVC
- **controllers**: Chứa các controller điều khiển luồng xử lý
  - Home.php: Xử lý trang chủ và các chức năng chính
  - Admin.php: Quản lý trang admin
  - Product.php: Quản lý sản phẩm
  - User.php: Quản lý người dùng
  - Cart.php: Quản lý giỏ hàng

- **models**: Chứa các model tương tác với cơ sở dữ liệu
  - ProductModel.php: Xử lý dữ liệu sản phẩm
  - UserModel.php: Xử lý dữ liệu người dùng
  - AdminModel.php: Xử lý dữ liệu quản trị
  - CategoryModel.php: Xử lý dữ liệu danh mục
  - HomeModel.php: Xử lý dữ liệu trang chủ

- **views**: Chứa các file giao diện
  - master1.php, master2.php, master3.php: Các template chính cho người dùng
  - masterAdmin.php: Template cho trang quản trị
  - blocks/: Chứa các thành phần giao diện nhỏ
  - Page/: Chứa các trang nội dung

- **core**: Chứa các thành phần cốt lõi của framework
  - App.php: Xử lý định tuyến (routing)
  - Controller.php: Lớp Controller cơ sở
  - DB.php: Kết nối cơ sở dữ liệu
  - URL.php: Xử lý URL

- **public**: Chứa tài nguyên tĩnh (CSS, JS, hình ảnh)

## 2. Cơ sở dữ liệu

Database "metacoffee" bao gồm các bảng:

1. **category**: Danh mục sản phẩm (trà sữa, cà phê, nước trái cây...)
2. **product**: Thông tin sản phẩm (tên, ảnh, giá, mô tả...)
3. **variant**: Các biến thể của sản phẩm (kích cỡ, giá)
4. **user**: Thông tin người dùng
5. **role**: Phân quyền (người dùng, quản lý)
6. **orders**: Thông tin đơn hàng
7. **order_details**: Chi tiết đơn hàng
8. **comment**: Bình luận về sản phẩm

## 3. Các chức năng chính

### 3.1. Chức năng người dùng
- **Đăng ký/Đăng nhập**: Quản lý tài khoản người dùng
- **Xem sản phẩm**: Hiển thị sản phẩm theo danh mục, tìm kiếm
- **Giỏ hàng**: Thêm sản phẩm vào giỏ hàng, thanh toán
- **Đặt hàng**: Thực hiện đặt hàng với các phương thức thanh toán khác nhau
- **Theo dõi đơn hàng**: Xem lịch sử và trạng thái đơn hàng
- **Bình luận**: Đánh giá và bình luận về sản phẩm
- **Quản lý tài khoản**: Cập nhật thông tin cá nhân, đổi mật khẩu

### 3.2. Chức năng quản trị (Admin)
- **Quản lý sản phẩm**: Thêm, sửa, xóa sản phẩm và biến thể
- **Quản lý danh mục**: Thêm, sửa, xóa danh mục sản phẩm
- **Quản lý đơn hàng**: Xem, cập nhật trạng thái đơn hàng
- **Quản lý người dùng**: Xem thông tin người dùng
- **Quản lý bình luận**: Kiểm duyệt và xóa bình luận

## 4. Quy trình hoạt động

### 4.1. Luồng xử lý chính
1. Người dùng truy cập trang web qua index.php
2. Bridge.php nạp các file cần thiết
3. App.php xử lý URL và định tuyến đến controller tương ứng
4. Controller gọi model để lấy dữ liệu
5. Controller truyền dữ liệu cho view hiển thị

### 4.2. Quy trình đặt hàng
1. Người dùng đăng nhập
2. Người dùng thêm sản phẩm vào giỏ hàng
3. Người dùng vào trang thanh toán (checkout)
4. Người dùng điền thông tin giao hàng và phương thức thanh toán
5. Đơn hàng được lưu vào hệ thống và chuyển trạng thái "Đang tiến hành"
6. Admin cập nhật trạng thái đơn hàng (Đang giao, Đã nhận hàng, Đã hủy)

## 5. Thiết kế giao diện

- Sử dụng template master1, master2, master3 cho các trang người dùng
- Sử dụng template masterAdmin cho trang quản trị
- Thiết kế responsive, thân thiện với người dùng
- Sử dụng AJAX để tải nội dung động (bình luận, tìm kiếm, phân trang)

## 6. Tính năng nổi bật

- **Đa dạng sản phẩm**: 5 danh mục chính (Trà sữa, Cà phê, Nước uống trái cây, Trà kem phô mai, Sữa chua dẻo)
- **Biến thể sản phẩm**: Mỗi sản phẩm có nhiều kích cỡ (Nhỏ, Vừa, Lớn) với giá khác nhau
- **Quản lý đơn hàng**: Theo dõi đơn hàng với nhiều trạng thái (Đang tiến hành, Đang giao, Đã nhận hàng, Đã hủy)
- **Hệ thống bình luận**: Người dùng có thể bình luận về sản phẩm
- **Tìm kiếm và lọc**: Tìm kiếm sản phẩm, lọc theo danh mục 