<main class="pt-3 container-fluid pb-5">
    <section class="name-pages">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h5>Chi tiết đơn hàng</h5>
                </li>
            </ol>
        </nav>
    </section>

    <?php
    // Đảm bảo $item không null bằng cách sử dụng showStatus thay vì showOrderDetailsID
    $item = mysqli_fetch_assoc($data['showStatus']);
    
    // Lấy order_info từ showStatus để sử dụng lại ở nhiều nơi
    $order_info = $item;
    
    // Reset con trỏ của showOrderDetails để lặp qua tất cả chi tiết đơn hàng
    if (isset($data['showOrderDetails']) && $data['showOrderDetails']) {
        mysqli_data_seek($data['showOrderDetails'], 0);
    }
    ?>
    
    <!-- Thông tin đơn hàng -->
    <section class="order-info mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Thông tin đơn hàng #<?= $item['order_id'] ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Mã đơn hàng:</strong> <span class="order-code">
                            <?php 
                            echo (isset($item['order_code'])) ? $item['order_code'] : 'MKOOPS' . $item['order_id']; 
                            ?>
                        </span></p>
                        <?php 
                        // Kiểm tra các cột có tồn tại không
                        $userModel = $this->model("UserModel");
                        $userName = "N/A";
                        $phone = isset($order_info['phone']) ? $order_info['phone'] : "N/A";
                        $address = isset($order_info['address']) ? $order_info['address'] : "N/A";
                        
                        // Nếu có cột name trong bảng orders
                        if (isset($order_info['name']) && !empty($order_info['name'])) {
                            $userName = $order_info['name'];
                        }
                        // Nếu không có name, thử lấy từ bảng user
                        else if (isset($order_info['user_id'])) {
                            $user_query = $userModel->ShowNameUser($order_info['user_id']);
                            if ($user_query && $user_data = mysqli_fetch_assoc($user_query)) {
                                $userName = $user_data['name'];
                            }
                        }
                        ?>
                        <p><strong>Người đặt:</strong> <?= $userName ?></p>
                        <p><strong>Số điện thoại:</strong> <?= $phone ?></p>
                        <p><strong>Địa chỉ:</strong> <?= $address ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Ngày đặt:</strong> <?= isset($item['order_date']) ? date('d/m/Y H:i', strtotime($item['order_date'])) : 'N/A' ?></p>
                        <p><strong>Phương thức thanh toán:</strong> <?= isset($item['method']) ? ($item['method'] == 'banking' ? 'Chuyển khoản ngân hàng' : 'Thanh toán khi nhận hàng') : 'N/A' ?></p>
                        <p><strong>Trạng thái thanh toán:</strong> 
                            <?php 
                            $payment_status = "Chưa thanh toán";
                            if (isset($order_info['payment_status'])) {
                                $payment_status = $order_info['payment_status'];
                            } else if (isset($item['payment_status'])) {
                                $payment_status = $item['payment_status'];
                            } else if (isset($item['method']) && $item['method'] == 'payLater') {
                                $payment_status = "Chưa thanh toán";
                            }
                            
                            if ($payment_status == "Đã thanh toán") {
                                echo '<span class="badge badge-success">Đã thanh toán</span>';
                            } else {
                                echo '<span class="badge badge-warning">Chưa thanh toán</span>';
                            }
                            ?>
                        </p>
                        <p><strong>Trạng thái đơn hàng:</strong>
                            <?php
                            if (isset($order_info['status'])) {
                                $status = $order_info['status'];
                                if ($status == "Đang tiếp nhận") {
                                    echo '<span class="badge badge-info">Đang tiếp nhận</span>';
                                } elseif ($status == "Đang tiến hành") {
                                    echo '<span class="badge badge-primary">Đang tiến hành</span>';
                                } elseif ($status == "Đang giao") {
                                    echo '<span class="badge badge-secondary">Đang giao</span>';
                                } elseif ($status == "Đã nhận hàng") {
                                    echo '<span class="badge badge-success">Đã nhận hàng</span>';
                                } elseif ($status == "Đã hủy") {
                                    echo '<span class="badge badge-danger">Đã hủy</span>';
                                }
                            } else {
                                echo '<span class="badge badge-warning">Không xác định</span>';
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Danh sách sản phẩm -->
    <section class="Product mb-4">
        <h5 class="mb-3">Sản phẩm trong đơn hàng</h5>
        <table class="table border-0 rounded">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Kích thước</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody id="tableSearch">
                <?php
                $tongTien = 0;
                while ($row = mysqli_fetch_array($data['showOrderDetails'])) {
                    $thanhTien = $row['num'] * $row['price'];
                    $tongTien += $thanhTien;
                ?>
                    <tr>
                        <td class="capitalize"><img class="thumbnailOD" src="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>" alt=""></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['size'] ?></td>
                        <td><?= $row['num'] ?></td>
                        <td><?= number_format($row['price'], 0, ",", ".") ?> VNĐ</td>
                        <td><?= number_format($thanhTien, 0, ",", ".") ?> VNĐ</td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="5" class="text-right"><strong>Tổng tiền:</strong></td>
                    <td><strong><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Form cập nhật trạng thái -->
    <section class="update-section mb-4">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= BASE_URL ?>/Admin/updateOrder/<?= $item['order_id'] ?>" method="POST" class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Cập nhật trạng thái đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="orderStatus">Trạng thái đơn hàng:</label>
                            <select class="form-control" id="orderStatus" name="status">
                                <?php
                                // Sử dụng lại biến order_info đã được tạo ở trên
                                $currentStatus = isset($order_info['status']) ? $order_info['status'] : 'Đang tiếp nhận';
                                $statuses = ["Đang tiếp nhận", "Đang tiến hành", "Đang giao", "Đã nhận hàng", "Đã hủy"];
                                foreach ($statuses as $status) {
                                    $selected = ($currentStatus == $status) ? 'selected' : '';
                                    echo "<option value=\"$status\" $selected>$status</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật trạng thái đơn hàng</button>
                    </div>
                </form>
            </div>
            
            <div class="col-md-6">
                <form action="<?= BASE_URL ?>/Admin/updatePaymentStatus/<?= $item['order_id'] ?>" method="POST" class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Cập nhật trạng thái thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="paymentStatus">Trạng thái thanh toán:</label>
                            <select class="form-control" id="paymentStatus" name="payment_status">
                                <?php
                                // Lấy trạng thái thanh toán từ order_info hoặc mặc định là "Chưa thanh toán"
                                $currentPaymentStatus = "Chưa thanh toán";
                                if (isset($order_info['payment_status'])) {
                                    $currentPaymentStatus = $order_info['payment_status'];
                                } else if (isset($item['payment_status'])) {
                                    $currentPaymentStatus = $item['payment_status'];
                                }
                                
                                $paymentStatuses = ["Chưa thanh toán", "Đã thanh toán"];
                                foreach ($paymentStatuses as $status) {
                                    $selected = ($currentPaymentStatus == $status) ? 'selected' : '';
                                    echo "<option value=\"$status\" $selected>$status</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Cập nhật trạng thái thanh toán</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Nút quay lại -->
    <div class="text-center mb-4">
        <?php
        $previous = "javascript:history.go(-1)";
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        ?>
        <a href="<?= $previous ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại danh sách đơn hàng</a>
    </div>
</main>

<style>
.order-code {
    font-family: monospace;
    font-weight: bold;
    background-color: #f8f9fa;
    padding: 3px 6px;
    border-radius: 4px;
    border: 1px solid #dee2e6;
}

.thumbnailOD {
    max-width: 80px;
    max-height: 80px;
    object-fit: contain;
}

/* Màu cho badge trạng thái */
.badge {
    padding: 8px;
    font-size: 0.9em;
}
</style>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Kiểm tra thông báo từ URL
        const urlParams = new URLSearchParams(window.location.search);
        const updateStatus = urlParams.get('update_status');
        
        if (updateStatus === 'success') {
            Swal.fire({
                title: "Thành công",
                text: "Cập nhật trạng thái thanh toán thành công!",
                icon: "success",
                confirmButtonText: "Đồng ý",
                timer: 2000,
                timerProgressBar: true
            });
        } else if (updateStatus === 'error') {
            Swal.fire({
                title: "Lỗi",
                text: "Cập nhật trạng thái thanh toán thất bại!",
                icon: "error",
                confirmButtonText: "Đồng ý"
            });
        }
    });
</script>