<main class="container">
    <nav class="nav-top">
        <ul>
            <li><a href="<?= BASE_URL ?>"><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="<?= BASE_URL ?>/Home/history">Lịch sử mua hàng</a></li><span>/</span>
            <li><a href="">Chi tiết đơn hàng</a></li>
        </ul>
    </nav>
    <section class="product-carts">
        <h1 class="product-carts_title">Chi tiết đơn hàng</h1>
        <?php
        // Lấy một đơn hàng mẫu để hiển thị thông tin chung
        if ($history_detail = mysqli_fetch_assoc($data['showHistoryDetails'])) {
            // Reset con trỏ để có thể đọc lại dữ liệu
            mysqli_data_seek($data['showHistoryDetails'], 0);

            // Lấy order_id từ URL
            $uri = $_SERVER['REQUEST_URI'];
            $parts = explode('/', $uri);
            $order_id = end($parts);
        ?>
            <div class="order-summary">
                <h3>Thông tin đơn hàng #<?= $order_id ?></h3>
                <div class="order-info-container">
                    <div class="order-info-column">
                        <?php
                        // Tạo mã đơn hàng mặc định nếu không có
                        $orderCode = 'MKOOPS' . $order_id;
                        if (isset($history_detail['order_code']) && !empty($history_detail['order_code'])) {
                            $orderCode = $history_detail['order_code'];
                        }
                        ?>
                        <p><strong>Mã đơn hàng:</strong> <span class="order-code"><?= $orderCode ?></span></p>
                        <p><strong>Ngày đặt:</strong> <?= isset($history_detail['order_date']) ? date('d/m/Y H:i', strtotime($history_detail['order_date'])) : 'N/A' ?></p>
                        <p><strong>Phương thức thanh toán:</strong> <?= isset($history_detail['method']) ? ($history_detail['method'] == 'payLater' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng') : 'N/A' ?></p>
                        <?php if (isset($history_detail['payment_status'])) : ?>
                        <p><strong>Trạng thái thanh toán:</strong> 
                            <span class="<?= $history_detail['payment_status'] == 'Đã thanh toán' ? 'danhan' : 'dangtiepnhan' ?>">
                                <?= $history_detail['payment_status'] ?>
                            </span>
                        </p>
                        <?php endif; ?>
                    </div>
                    <div class="order-info-column">
                        <p><strong>Trạng thái:</strong>
                            <?php if (isset($history_detail['status'])) {
                                $status = $history_detail['status'];
                                if ($status == "Đang tiếp nhận") {
                                    echo '<span class="dangtiepnhan"><i class="fas fa-hourglass-start"></i> ' . $status . '</span>';
                                } elseif ($status == "Đang tiến hành") {
                                    echo '<span class="dangtienhanh"> ' . $status . '</span>';
                                } elseif ($status == "Đang giao") {
                                    echo '<span class="danggiao"><i class="fas fa-shipping-fast"></i> ' . $status . '</span>';
                                } elseif ($status == "Đã nhận hàng") {
                                    echo '<span class="danhan"><i class="fas fa-check-circle"></i> ' . $status . '</span>';
                                } elseif ($status == "Đã hủy") {
                                    echo '<span class="dahuy"><i class="fas fa-times-circle"></i> ' . $status . '</span>';
                                }
                            } else {
                                echo 'N/A';
                            } ?>
                        </p>
                        <p><strong>Ghi chú:</strong> <?= isset($history_detail['note']) ? $history_detail['note'] : 'Không có' ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <section class="cart-list">
            <table class="table-cart">
                <thead>
                    <tr class="title-table">
                        <th>Sản phẩm</th>
                        <th>Kích thước</th>
                        <th width="150px">Đơn giá</th>
                        <th width="100px">Số lượng</th>
                        <th width="150px">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tongTien = 0;
                    while ($history = mysqli_fetch_assoc($data['showHistoryDetails'])) {
                        $thanhTien = $history['num'] * $history['price'];
                        $tongTien += $thanhTien;
                    ?>
                        <tr>
                            <td class="img-name"><img src="<?= BASE_URL ?>/<?= $history['thumbnail'] ?>" alt=""><a href="<?= BASE_URL ?>/home/product/<?= $history['product_id'] ?>"><?= $history['product_name'] ?></a></td>
                            <td><span class="size-cart"><?= $history['size'] ?></span></td>
                            <td><?= number_format($history['price'], 0, ",", ".") ?> VNĐ</td>
                            <td><?= $history['num'] ?></td>
                            <td><?= number_format($thanhTien, 0, ",", ".") ?> VNĐ</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="total-label">Tổng tiền:</td>
                        <td class="total-amount"><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <div class="order-actions">
            <?php
            $previous = "javascript:history.go(-1)";
            if (isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
            ?>
            <a href="<?= $previous ?>" class="btn-back"><i class="fas fa-arrow-left"></i> Quay lại</a>

            <?php if (isset($history_detail['status'])) {
                if ($history_detail['status'] == "Đang tiếp nhận") { ?>
                    <a href="javascript:void(0)" onclick="cancelOrder(<?= $order_id ?>)" class="btn-cancel">
                        <i class="fas fa-times"></i> Hủy đơn hàng
                        <?= $order_id ?>
                    </a>

                    <script>
                        function cancelOrder(orderId) {
                            Swal.fire({
                                title: 'Xác nhận hủy đơn hàng',
                                text: 'Bạn có chắc chắn muốn hủy đơn hàng này?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Xác nhận hủy',
                                cancelButtonText: 'Không hủy'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '<?= BASE_URL ?>/Home/cancelOrder/' + orderId;
                                }
                            });
                        }
                    </script>
                <?php } else { ?>
                    <a href="<?= BASE_URL ?>" class="btn-continue">
                        <i class="fas fa-shopping-cart"></i> Tiếp tục mua sắm
                    </a>
            <?php }
            } ?>
        </div>
    </section>
</main>

<!-- Thêm thư viện SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Style cho SweetAlert */
    .swal2-popup {
        font-size: 1.6rem !important;
        border-radius: 15px !important;
    }
    .swal2-title {
        font-size: 2rem !important;
    }
    .swal2-content {
        font-size: 1.6rem !important;
    }
    .swal2-styled.swal2-confirm {
        background-color: #ff929b !important;
    }
    .swal2-styled.swal2-cancel {
        background-color: #6c757d !important;
    }
    
    /* Style cho mã đơn hàng */
    .order-code {
        font-family: monospace;
        font-weight: bold;
        background-color: #f8f9fa;
        padding: 3px 6px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
        color: #000;
    }
    
    /* Style cho thông tin đơn hàng */
    .order-info-container {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }
    
    .order-info-column {
        flex: 1;
        min-width: 250px;
        padding: 0 15px;
    }
    
    @media (max-width: 768px) {
        .order-info-column {
            flex: 100%;
            margin-bottom: 15px;
        }
    }
</style>

<script>
    function cancelOrder(orderId) {
        Swal.fire({
            title: 'Xác nhận hủy đơn hàng',
            text: 'Bạn có chắc chắn muốn hủy đơn hàng này?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận hủy',
            cancelButtonText: 'Không hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/Home/cancelOrder/' + orderId;
            }
        });
    }
</script>