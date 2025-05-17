<main class="container">
    <nav class="nav-top">
        <ul>
            <li><a href="<?= BASE_URL ?>"><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="">Lịch sử mua hàng</a></li>
        </ul>
    </nav>
    <section class="product-carts">
        <h1 class="product-carts_title">Lịch sử mua hàng</h1>
        <section class="cart-list">
            <?php
            $rowCount = mysqli_num_rows($data['showHistoty']);
            if ($rowCount > 0) {
            ?>
                <table class="table-cart">
                    <thead>
                        <tr class="title-table">
                            <th width="" style="padding-left: 10px">Mã đơn hàng</th>
                            <th width="" class="address_history">Địa chỉ</th>
                            <th width="">Số điện thoại</th>
                            <th width="">Thời gian</th>
                            <th width="">Trạng thái</th>
                            <th width="" style="text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($history = mysqli_fetch_array($data['showHistoty'])) {
                        ?>
                            <tr>
                                <td class="img-name" style="padding-left: 10px"><?= $history['order_id'] ?></td>
                                <td class="address_hisory"><span class="size-cart"><?= $history['address'] ?></span></td>
                                <td><?= $history['phone'] ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($history['order_date'])) ?></td>
                                <?php
                                if ($history['status'] == "Đang tiếp nhận") {
                                ?>
                                    <td><span class="dangtiepnhan status_history"><i class="fas fa-hourglass-start"></i> <?= $history['status'] ?></span></td>
                                <?php
                                }
                                if ($history['status'] == "Đang tiến hành") {
                                ?>
                                    <td><span class="dangtienhanh status_history"></i> <?= $history['status'] ?></span></td>
                                <?php
                                }
                                if ($history['status'] == "Đang giao") {
                                ?>
                                    <td><span class="danggiao status_history"><i class="fas fa-shipping-fast"></i> <?= $history['status'] ?></span></td>
                                <?php
                                }
                                if ($history['status'] == "Đã nhận hàng") {
                                ?>
                                    <td><span class="danhan status_history"><i class="fas fa-check-circle"></i> <?= $history['status'] ?></span></td>
                                <?php
                                }
                                if ($history['status'] == "Đã hủy") {
                                ?>
                                    <td><span class="dahuy status_history"><i class="fas fa-times-circle"></i> <?= $history['status'] ?></span></td>
                                <?php
                                }
                                ?>

                                <td style="text-align: center;">
                                    <a href="<?= BASE_URL ?>/Home/historyDetails/<?= $history['order_id'] ?>" class="view-order"><i class="fas fa-eye"></i> Xem</a>
                                    
                                    <!-- <?php if ($history['status'] == "Đang tiếp nhận") { ?>
                                        <a href="javascript:void(0)" onclick="cancelOrder(<?= $history['order_id'] ?>)" class="cancel-order"><i class="fas fa-times"></i> Hủy</a>
                                    <?php } ?> -->
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                
                <!-- Script xử lý hủy đơn hàng -->
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
            <?php
            } else {
            ?>
                <div class="error-search">
                    <img src="<?= BASE_URL ?>/MVC/public/images/empty-orders.png" alt="Không có đơn hàng">
                    <div class="title">Bạn chưa có đơn hàng nào</div>
                    <div>Hãy đặt hàng để thưởng thức những sản phẩm tuyệt vời của chúng tôi</div>
                    <a href="<?= BASE_URL ?>" class="checkout-btn" style="display: inline-block; margin-top: 20px; text-decoration: none; padding: 10px 20px; background-color: var(--primary-color); color: white; border-radius: 4px;">Mua sắm ngay</a>
                </div>
            <?php
            }
            ?>
        </section>
    </section>
</main>