<main class="container">
    <nav class="nav-top">
        <ul>
            <li><a href=""><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="">Giỏ hàng</a></li>
        </ul>
    </nav>
    <section class="checkout">
        <h1 class="checkout-title">Chi tiết thanh toán</h1>
        <section class="checkout-main">
            <form action="<?=BASE_URL?>/home/checkoutAct" class="form-checkout" method="post" id="checkoutForm">
                <?php
                $result = mysqli_fetch_assoc($data['showUserCheckout']);
                ?>
                <label for="">Họ và tên <span class="red">*</span></label>
                <input type="text" required name="name" value="<?= $result['name'] ?>" placeholder="Họ và tên...">

                <label for="">Số điện thoại<span class="red">*</span></label>
                <input type="text" required name="phone" value="<?= $result['phone'] ?>" placeholder="Số điện thoại...">

                <label for="">Địa chỉ<span class="red">*</span></label>
                <textarea required name="address" id="address" cols="30" rows="4" placeholder="Địa chỉ nhận hàng..."><?= $result['address'] ?></textarea>

                <label for="">Ghi chú đơn hàng</label>
                <textarea name="note" id="" cols="30" rows="2" placeholder="Ghi chú cho đơn hàng..."></textarea>

                <label class="title" for="">Hình thức thanh toán<span class="red">*</span></label>
                <div class="form-group">
                    <input type="radio" value="payLater" name="banking" id="payLater" checked>
                    <label for="payLater">Thanh toán khi nhận hàng</label>
                </div>
                <div class="form-group">
                    <input type="radio" value="banking" id="banking" name="banking">
                    <label for="banking">Chuyển khoảng ngân hàng</label>
                </div>
                <div class="content-banking content-banking-none">
                    <div class="box">
                        <img src="https://znews-stc.zdn.vn/static/topic/company/vietcom.jpg" alt="">
                        <div class="content-banking-p">
                            <p>Nội dung: Thanh toán cho đơn hàng <span class="bold">MKOOPS09</span></p>
                            <p>Số tiền <span class="b-600">100.000 VNĐ</span></p>
                            <p>Chủ tài khoản: <span class="b-600">Coffee Shop</span></p>
                            <p>Số tài khoản: <span class="b-600">99999999999</span></p>
                            <p>Ngân hàng: <span class="b-600">Vietcombank</span></p>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['userlogin'])) {
                ?>
                    <input hidden type="hidden" name="user_id" value="<?= $_SESSION['userlogin'][3] ?>"> <br>
                <?php
                }
                ?>
                <input type="hidden" name="checkout" value="1">
            </form>
            <div class="checkout-cart">
                <h3>Đơn hàng</h3>
                <?php
                $tongTien = 0;
                if (isset($_SESSION['giohang'])) {
                    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                        $total = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                ?>
                        <div class="product-item">
                            <img class="thumbnail-checkoit-pr" src="<?= BASE_URL ?>/<?= $_SESSION['giohang'][$i][4] ?>" alt="">
                            <div class="text-product">
                                <p><?= $_SESSION['giohang'][$i][5] ?></p>
                                <p>Size: <?= $_SESSION['giohang'][$i][0] ?> (<?= $_SESSION['giohang'][$i][2] ?>)</p>
                                <p class="b-600"><?= number_format($_SESSION['giohang'][$i][3], 0, ",", ".") ?> VNĐ</p>
                            </div>
                        </div>
                <?php
                        $tongTien = $total + $tongTien;
                    }
                }
                ?>
                <div class="price-checkout">
                    <div class="d-between price-checkout-pr">
                        <p>Số tiền</p>
                        <p><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</p>
                    </div>
                    <div class="d-between price-checkout-ship">
                        <p>Phí vận chuyển</p>
                        <p>0 VNĐ</p>
                    </div>
                </div>
                <div class="d-between price-checkout-total">
                    <p>Tổng thanh toán</p>
                    <p><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</p>
                </div>
                <button type="button" id="checkoutSubmit" class="btn-checkout">Tiến hành đặt hàng</button>
            </div>
        </section>
    </section>
</main>
<style>
    main.container .checkout .checkout-main form.form-checkout label.error{
        font-size: 1.7rem;
    }
</style>

<script>
    $(document).ready(function() {
        // Lưu giỏ hàng vào localStorage để dự phòng
        <?php if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0): ?>
        try {
            localStorage.setItem('backup_cart', JSON.stringify(<?= json_encode($_SESSION['giohang']) ?>));
            console.log("Đã lưu giỏ hàng vào localStorage:", <?= json_encode($_SESSION['giohang']) ?>);
        } catch(e) {
            console.log("Không thể lưu giỏ hàng vào localStorage:", e);
        }
        <?php endif; ?>

        // Thêm hàm kiểm tra session trước khi submit form
        function checkSessionBeforeSubmit() {
            var processing = $('<div id="processingOverlay" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;display:flex;justify-content:center;align-items:center;"><div style="background:white;padding:20px;border-radius:5px;"><p style="margin:0;font-size:16px;"><i class="fas fa-spinner fa-spin"></i> Đang xử lý đơn hàng...</p></div></div>');
            $('body').append(processing);
            
            return true;
        }

        $("#checkoutSubmit").click(function() {
            // Xác thực form trước khi submit
            if ($("#checkoutForm")[0].checkValidity()) {
                // Hiển thị thông báo đang xử lý
                $(this).prop('disabled', true).text('Đang xử lý...');
                
                // Đảm bảo giỏ hàng được lưu trước khi submit
                try {
                    if (localStorage) {
                        localStorage.setItem('backup_cart', JSON.stringify(<?= json_encode($_SESSION['giohang'] ?? []) ?>));
                    }
                } catch(e) {
                    console.log("Không thể lưu giỏ hàng vào localStorage:", e);
                }
                
                // Trực tiếp submit form
                checkSessionBeforeSubmit();
                $("#checkoutForm").submit();
            } else {
                // Kích hoạt validation của trình duyệt
                $("#checkoutForm")[0].reportValidity();
            }
        });

        // Xử lý hiển thị thông tin ngân hàng khi chọn phương thức thanh toán
        $('input[name="banking"]').change(function() {
            if($(this).val() == 'banking') {
                $('.content-banking').removeClass('content-banking-none');
            } else {
                $('.content-banking').addClass('content-banking-none');
            }
        });
    });
</script>