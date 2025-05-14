# Hướng dẫn tích hợp chức năng quản lý tồn kho

## 1. Thay đổi cơ sở dữ liệu

1. Truy cập phpMyAdmin và nhập vào cơ sở dữ liệu `metacoffee`
2. Chạy tập lệnh SQL trong file `metacoffee_stock.sql` để tạo các bảng cần thiết:
   - Bảng `stock`: Lưu thông tin tồn kho của từng sản phẩm theo kích cỡ
   - Bảng `transactions`: Lưu lịch sử các giao dịch nhập/xuất kho

## 2. Thêm các file đã tạo vào cấu trúc MVC

1. **Models**:
   - Thêm file `StockModel.php` vào thư mục `MVC/models/`

2. **Controllers**:
   - Thêm file `Stock.php` vào thư mục `MVC/controllers/`
   - Đã cập nhật file `Cart.php` và `Home.php` để tích hợp kiểm tra tồn kho

3. **Views**:
   - Thêm file `stock_management.php` vào thư mục `MVC/views/Page/`
   - Thêm file `stock_edit.php` vào thư mục `MVC/views/Page/`
   - Thêm file `transactions.php` vào thư mục `MVC/views/Page/`
   - Cập nhật file `admin_sidebar.php` để thêm menu quản lý tồn kho
   - Cập nhật file `product.php` để hiển thị thông tin tồn kho

## 3. Chức năng đã thêm vào hệ thống

### 3.1. Quản lý tồn kho (Admin)

- **Xem danh sách tồn kho**: Hiển thị danh sách sản phẩm và số lượng tồn theo kích cỡ
- **Thêm mới tồn kho**: Thêm số lượng tồn mới cho một sản phẩm
- **Cập nhật tồn kho**: Chỉnh sửa số lượng tồn của sản phẩm
- **Xóa thông tin tồn kho**: Xóa thông tin tồn kho của một sản phẩm
- **Xem lịch sử giao dịch**: Hiển thị lịch sử nhập/xuất kho

### 3.2. Người dùng (Customer)

- **Hiển thị số lượng tồn**: Hiển thị số lượng tồn kho khi xem chi tiết sản phẩm
- **Kiểm tra tồn kho**: Kiểm tra tồn kho trước khi thêm vào giỏ hàng
- **Thông báo hết hàng**: Hiển thị thông báo nếu sản phẩm hết hàng
- **Giảm số lượng tồn**: Tự động giảm số lượng tồn sau khi đặt hàng thành công

## 4. Hướng dẫn sử dụng

### 4.1. Quản lý tồn kho (Admin)

1. Đăng nhập vào trang admin
2. Nhấp vào menu "Quản lý tồn kho" ở sidebar
3. Sử dụng các chức năng:
   - Nhấp "Thêm mới tồn kho" để thêm số lượng tồn
   - Nhấp vào biểu tượng bút chì để chỉnh sửa số lượng tồn
   - Nhấp vào biểu tượng thùng rác để xóa thông tin tồn kho
   - Nhấp "Lịch sử giao dịch" để xem lịch sử nhập/xuất kho

### 4.2. Mua hàng (Người dùng)

1. Khi xem chi tiết sản phẩm, hệ thống sẽ hiển thị số lượng tồn
2. Nếu sản phẩm hết hàng, nút "Thêm vào giỏ hàng" sẽ bị vô hiệu hóa
3. Nếu sản phẩm còn hàng, người dùng có thể thêm vào giỏ hàng
4. Khi thanh toán, hệ thống kiểm tra lại số lượng tồn trước khi hoàn tất đơn hàng
5. Nếu đủ hàng, đơn hàng sẽ được xử lý và số lượng tồn sẽ tự động giảm

## 5. Lưu ý khi triển khai

1. Cần import dữ liệu tồn kho ban đầu cho tất cả sản phẩm
2. Kiểm tra kỹ các ràng buộc khóa ngoại khi xóa sản phẩm
3. Kiểm tra lại chức năng thanh toán sau khi tích hợp để đảm bảo việc cập nhật tồn kho hoạt động đúng
4. Cần kiểm tra quyền truy cập để đảm bảo chỉ admin mới có thể quản lý tồn kho 