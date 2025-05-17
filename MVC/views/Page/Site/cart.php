<?php
// Lấy giá trị max_cart_quantity từ cài đặt hệ thống
$Setting = $this->model("SettingModel");
$max_quantity = 10; // Giá trị mặc định
$setting = $Setting->getSetting('max_cart_quantity');
if ($setting && !empty($setting['setting_value'])) {
  $max_quantity = intval($setting['setting_value']);
}
?>
<main class="container">
    <nav class="nav-top">
        <ul>
            <li><a href=""><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="">Giỏ hàng</a></li>
        </ul>
    </nav>
    <section class="product-carts">
        <h1 class="product-carts_title">Giỏ hàng</h1>
        <section class="cart-list">
            <table class="table-cart">
                <thead>
                    <tr class="title-table">
                        <th>Sản phẩm</th>
                        <th>Kích thước</th>
                        <th width="200px">Giá tiền</th>
                        <th width="200px">Số lượng</th>
                        <th width="200px">Tổng giá</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tongTien = 0;
                    if (isset($_SESSION['giohang'])) {
                        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                            $total = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    ?>
                            <tr>
                                <td class="img-name"><img src="<?= BASE_URL ?>/<?= $_SESSION['giohang'][$i][4] ?>" alt=""><a href="<?= BASE_URL ?>/home/product/<?= $_SESSION['giohang'][$i][1] ?>"><?= $_SESSION['giohang'][$i][5] ?></a></td>
                                <td><span class="size-cart"><?= $_SESSION['giohang'][$i][0] ?></span></td>
                                <td><?= number_format($_SESSION['giohang'][$i][3], 0, ",", ".") ?> VNĐ</td>
                                <td><input class="numCart" type="number" min="1" max="<?= $max_quantity ?>" value="<?= $_SESSION['giohang'][$i][2] ?>"></td>
                                <td><?= number_format($total, 0, ",", ".") ?> VNĐ</td>
                                <td>
                                    <a class="delete-cart" href="<?=BASE_URL?>/Cart/deldCart/<?=$i?>">Xóa</a>
                                </td>
                            </tr>
                    <?php
                            $tongTien = $total + $tongTien;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="cart-act">
            <div class="cart-act_shopping">
                <a href="<?= BASE_URL ?>">Tiếp tục mua hàng</a>
            </div>
            <div class="cart-act_checkout">
                <h3>Tổng giỏ hàng</h3>
                <div class="price-provisional">
                    <p>Tạm tính</p>
                    <p class="text-red font-bold"><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</p>
                </div>
                <div class="price-provisional">
                    <p>Phí ship</p>
                    <p class="text-red font-bold">0 VNĐ</p>
                </div>
                <div class="price-total">
                    <p>Tổng đơn hàng</p>
                    <p class="text-red font-bold"><?= number_format($tongTien, 0, ",", ".") ?> VNĐ</p>
                </div>
                <a class="checkout-btn" href="<?= BASE_URL ?>/home/checkout">Tiến hành thanh toán</a>
            </div>
        </section>
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
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Hàm hiển thị thông báo đẹp thay cho alert
    function showNotification(message, type = 'info') {
      Swal.fire({
        title: 'Thông báo',
        text: message,
        icon: type,
        confirmButtonText: 'Đồng ý',
        timer: 3000,
        timerProgressBar: true
      });
    }
    
    // Lấy giá trị số lượng tối đa từ PHP
    var maxCartQuantity = <?= $max_quantity ?>;
    
    // Lấy tất cả các input số lượng
    const quantityInputs = document.querySelectorAll('.numCart');
    
    // Gắn sự kiện cho mỗi input
    quantityInputs.forEach(function(input) {
      input.addEventListener('change', function() {
        // Lấy giá trị hiện tại
        let value = parseInt(this.value);
        
        // Kiểm tra và giới hạn giá trị
        if (isNaN(value) || value < 1) {
          this.value = 1;
        } else if (value > maxCartQuantity) {
          showNotification('Số lượng tối đa cho mỗi sản phẩm là ' + maxCartQuantity + '.', 'warning');
          this.value = maxCartQuantity;
        }
        
        // Gọi hàm cập nhật giỏ hàng (nếu có)
        updateCart();
      });
    });
    
    // Hàm cập nhật giỏ hàng (có thể sử dụng AJAX để cập nhật server nếu cần)
    function updateCart() {
      // Tính lại tổng tiền và cập nhật giao diện
      // ...
      
      // Có thể thêm AJAX để cập nhật giỏ hàng trong session
      
      // Tạm thời reload để cập nhật số lượng
      // location.reload();
    }
  });
</script>