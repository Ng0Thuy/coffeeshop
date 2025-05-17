<main id="nhan" class="grid wide container">
  <?php
  $row = mysqli_fetch_assoc($data['showProductItem']);
  ?>
  <nav class="nav-top">
    <ul>
      <li><a href=""><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
      <li><a href="">Chi tiết sản phẩm</a></li><span>/</span>
      <li><a href=""><?= $row['product_name'] ?></a></li>
    </ul>
  </nav>
  <div class="card mt-1">
    <!-- card left -->
    <div class="product-imgs">
      <div class="img-display">
        <div class="img-showcase">
          <a class="price_sale_a" href="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>">
            <img src="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>" alt="">
          </a>
          <?php
          if ($row['price_sale'] > 0) {
          ?>
            <p class="price_sale_img"><?= $row['price_sale'] ?>%</p>
          <?php
          }
          ?>
        </div>
      </div>

    </div>
    <!-- card right -->
    <div class="product-content">
      <h3 class="product-title"><?= $row['product_name'] ?></h3>
      <form action="<?= BASE_URL ?>/Home/AddToCart" method="POST">
        <div class="product-price">
          <?php
          while ($item = mysqli_fetch_array(($data['showPrice']))) {
          ?>
            <p class="new-price price-bg <?= $item['size'] ?>" hidden name="<?= $item['price'] ?>" style="font-size: 3rem;"><?= number_format($item['price'], 0, ",", ",") ?> VNĐ</p>
          <?php
          }
          ?>
          <p class="new-price price-bg" id="priceSize" name="<?= $row['size'] ?>" style="font-size: 3rem;"><?= number_format($row['price'], 0, ",", ",") ?> VNĐ</p>
          <p class="new-price slogan" style="font-size: 16px;">Ở đâu rẻ hơn, Coffee Shop hoàn tiền</p>
        </div>
        <div class="product-detail">
          <ul class="product-detail__list">
            <li class="product-detail__item">Danh mục: <span><?= $row['category_name'] ?></span></li>
            <li class="product-detail__item">Tình trạng:
              <span id="stockStatus">
                <?php
                // Kiểm tra tồn kho
                $Stock = $this->model("StockModel");
                $stock_data = $Stock->getStock($row['product_id'], 'Nhỏ'); // Mặc định kích cỡ Nhỏ

                if ($stock_data && $stock_data['quantity'] > 0) {
                  echo '<span class="text-success">Còn hàng (' . $stock_data['quantity'] . ')</span>';
                } else {
                  echo '<span class="text-danger">Hết hàng</span>';
                }
                ?>
              </span>
            </li>
            <li class="product-detail__item">Vận chuyển: <span>Có</span></li>
          </ul>
        </div>
        <div class="purchase-info">
          <!-- <button name="sizeS" value="S" class="size">S</button>
        <button name="sizeM" class="size">M</button>
        <button name="sizeL" class="size">L</button> -->
          <span class="giapos"></span>
          <input class="sizes" hidden checked name="size" type="radio" value="Nhỏ" id="sizeNho">
          <label for="sizeNho" id="labelNho">Nhỏ</label>
          <input class="sizes" hidden name="size" type="radio" value="Vừa" id="sizeVua">
          <label for="sizeVua" id="labelVua">Vừa</label>
          <input class="sizes" hidden name="size" type="radio" value="Lớn" id="sizeLon">
          <label for="sizeLon" id="labelLon">Lớn</label>
        </div>
        <div class="purchase-info">
          <span class="btn" id="minus">-</span>
          <input type="number" name="num" min="1" value="1" max="10" id="input">
          <span class="btn" id="plus" style="margin-right: 50px;">+</span>
        </div>
        <input type="number" hidden name="id" value="<?= $row['product_id'] ?>">
        <input type="text" hidden id="pricePost" name="" value="<?= $row['price'] ?>">
        <input type="text" hidden id="pricePost2" name="price" value="<?= $row['price'] ?>">
        <input type="text" hidden name="thumbnail" value="<?= $row['thumbnail'] ?>">
        <input type="text" hidden name="name" value="<?= $row['product_name'] ?>">

        <div class="click">
          <button type="submit" name="addToCart" id="btn1"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
        </div>
      </form>
    </div>
  </div>
  <div class="nhan_container">
    <ul class="tab_navigation">
      <li class="mota active">Mô tả</li>
      <li class="danhgia">Đánh giá</li>
    </ul>
    <div class="tab_container_area" id="mota">
      <div class="tab_container">
        <h3 class="comment-heading">Mô tả sản phẩm</h3>
        <p><?= $row['description'] ?></p>
      </div>
    </div>
    <div class="tab_container_area" id="danhgia">
      <div class="tab_container">
        <h3 class="comment-heading">Bình luận</h3>
        <div id="loadComment">
          <!-- NÔI DUNG BÌNH LUẬN Ở ĐÂY -->
        </div>
        <form action="" method="post" id="formComment">
          <textarea cols="131" name="content" rows="4" placeholder="Viết bình luận..."></textarea>
          <input type="text" hidden name="product_id" value="<?= $row['product_id'] ?>"> <br>
          <?php
          if (isset($_SESSION['userlogin'])) {
          ?>
            <input type="text" hidden name="user_id" value="<?= $_SESSION['userlogin'][3] ?>"> <br>
          <?php
          }
          ?>
          <button type="submitComment">Gửi bình luận</button>
        </form>
      </div>
    </div>
  </div>
  <div class="nhan_container related-products">
    <div class="featured-product__title linecha">
      <div class="text-2 line-bottom">
        SẢN PHẨM LIÊN QUAN
      </div>
    </div>
    <div class="list-product related-products__list row sm-gutter grid-4">
      <?php
      if (isset($data['ProductRelated'])) {
        while ($item = mysqli_fetch_array($data['ProductRelated'])) {
      ?>
          <div class="col l-2-5 m-4 c-6">
            <a href="<?= BASE_URL ?>/home/product/<?= $item['product_id'] ?>" class="product-cart">
              <div class="product-cart__tags justify-content-right">
                <?php
                if ($item['price_sale'] > 0) {
                ?>
                  <div class="tag-discount"><?= $item['price_sale'] ?>%</div>
                <?php
                }
                ?>
              </div>
              <div class="product-cart__img">
                <img src="<?= BASE_URL ?>/<?= $item['thumbnail'] ?>" alt="">
              </div>
              <div class="product-cart__info">
                <div class="info-title"><?= $item['product_name'] ?></div>
                <div class="info-rating">
                  <div class="rating-list">
                    <i class="rating-icon fas fa-star"></i>
                    <i class="rating-icon fas fa-star"></i>
                    <i class="rating-icon fas fa-star"></i>
                    <i class="rating-icon fas fa-star"></i>
                    <i class="rating-icon fas fa-star"></i>
                  </div>
                  <p class="rating-text">(2 đánh giá)</p>
                </div>
                <div class="info-price">
                  <?php
                  if ($item['price_sale'] > 0) {
                    $price = $item['price'];
                    $sale = $item['price_sale'];
                    $price_sale = ($sale / 100) * $price;
                    $priceTop = $price - $price_sale;
                  ?>
                    <div class="info-origin-price"><?= number_format($priceTop, 0, ",", ".") ?> VNĐ</div>
                    <div class="info-sale-price"><?= number_format($item['price'], 0, ",", ".") ?> VNĐ</div>
                  <?php
                  } else {
                  ?>
                    <div class="info-origin-price"><?= number_format($item['price'], 0, ",", ".") ?> VNĐ</div>
                  <?php
                  }
                  ?>
                </div>
                <div class="btn btn--primary btn-order-product">Đặt hàng</div>
              </div>
            </a>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</main>
<style>
  #content-error {
    font-size: 1.6rem;
  }
  
  .size-out-of-stock {
    color: #d9534f;
    opacity: 0.8;
    cursor: pointer;
    text-decoration: none;
    position: relative;
  }

  .out-of-stock {
    font-size: 0.8em;
    color: #d9534f;
    font-style: italic;
  }

  /* Tùy chỉnh style cho các label */
  .purchase-info label {
    display: inline-block;
    margin-right: 10px;
    padding: 5px 15px;
    border: 1px solid #ddd;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    user-select: none; /* Ngăn chọn văn bản khi click */
  }

  .purchase-info label:hover {
    border-color: #ff929b;
  }

  .product-detail__item .fas.fa-exclamation-triangle{
    color: yellow;
  }
  .product-detail__item .fas.fa-check-circle{
    color: #66ff66;
  }
  .purchase-info input[type="radio"]:checked + label {
    background-color: #ff929b;
    color: white;
    border-color: #ff929b;
  }

  /* Đảm bảo label vẫn nhấn được khi hết hàng nhưng có visual cue */
  .purchase-info input[type="radio"]:checked + label.size-out-of-stock {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
  }
  
  /* Pointer effect cho tất cả các label */
  .purchase-info label {
    cursor: pointer !important;
  }
</style>

<script>
  $(document).ready(function() {
    // Kiểm tra tồn kho cho tất cả các kích cỡ khi trang tải xong
    checkAllSizes();
    
    // Thêm sự kiện click cho labels để chọn radio button tương ứng
    $('.purchase-info label').click(function() {
      var forAttr = $(this).attr('for');
      $('#' + forAttr).prop('checked', true);
      $('#' + forAttr).trigger('change');
    });

    // Hàm kiểm tra tồn kho cho tất cả các kích cỡ
    function checkAllSizes() {
      var product_id = <?= $row['product_id'] ?>;
      var sizes = ['Nhỏ', 'Vừa', 'Lớn'];
      
      sizes.forEach(function(size) {
        checkSizeAvailability(product_id, size);
      });
    }

    // Hàm kiểm tra tồn kho cho một kích cỡ cụ thể
    function checkSizeAvailability(product_id, size) {
      $.ajax({
        url: '<?= BASE_URL ?>/Stock/checkStock',
        type: 'POST',
        data: {
          product_id: product_id,
          size: size,
          quantity: 1
        },
        dataType: 'json',
        success: function(response) {
          var labelId = '';
          var sizeId = '';
          
          if (size === 'Nhỏ') {
            labelId = 'labelNho';
            sizeId = 'sizeNho';
          } else if (size === 'Vừa') {
            labelId = 'labelVua';
            sizeId = 'sizeVua';
          } else if (size === 'Lớn') {
            labelId = 'labelLon';
            sizeId = 'sizeLon';
          }
          
          if (response.quantity <= 0) {
            // Nếu hết hàng, thêm thông báo vào label nhưng vẫn cho phép chọn
            $('#' + labelId).html(size + ' <span class="out-of-stock">(Hết hàng)</span>');
            $('#' + labelId).addClass('size-out-of-stock');
          } else {
            // Nếu còn hàng
            $('#' + labelId).html(size);
            $('#' + labelId).removeClass('size-out-of-stock');
          }
        }
      });
    }

    // Cập nhật thông tin tồn kho khi chọn kích cỡ
    $('.sizes').change(function() {
      var product_id = <?= $row['product_id'] ?>;
      var size = $(this).val();
      var quantity = $('#input').val();

      // Gọi AJAX để kiểm tra tồn kho
      updateStockInfo(product_id, size, quantity);
    });

    // Cập nhật khi thay đổi số lượng
    $('#input, #plus, #minus').on('click change', function() {
      setTimeout(function() {
        var product_id = <?= $row['product_id'] ?>;
        var size = $('input[name="size"]:checked').val();
        var quantity = $('#input').val();
        // Gọi AJAX để kiểm tra tồn kho
        updateStockInfo(product_id, size, quantity);
      }, 100);
    });

    // Kiểm tra tồn kho ban đầu
    var initial_product_id = <?= $row['product_id'] ?>;
    var initial_size = 'Nhỏ'; // Mặc định
    var initial_quantity = $('#input').val();

    updateStockInfo(initial_product_id, initial_size, initial_quantity);

    // Hàm cập nhật thông tin tồn kho
    function updateStockInfo(product_id, size, quantity) {
      $.ajax({
        url: '<?= BASE_URL ?>/Stock/checkStock',
        type: 'POST',
        data: {
          product_id: product_id,
          size: size,
          quantity: quantity
        },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            var available = response.quantity;
            // Giới hạn tối đa là 10 sản phẩm hoặc số lượng tồn kho (nếu nhỏ hơn 10)
            var max_quantity = Math.min(10, available);

            if (available > 0) {
              $('#stockStatus').html('<span class="text-success"><i class="fas fa-check-circle"></i> Còn hàng (' + available + ')</span>');
              $('#btn1').prop('disabled', false);
              $('#btn1').css('opacity', '1');

              // Giới hạn số lượng đặt hàng không vượt quá tồn kho và tối đa 10
              if (parseInt(quantity) > max_quantity) {
                $('#input').val(max_quantity);
                if (max_quantity === 10) {
                  alert('Số lượng tối đa cho mỗi sản phẩm là 10.');
                }
              }
            } else {
              $('#stockStatus').html('<span class="text-danger"><i class="fas fa-times-circle"></i> Hết hàng</span>');
              $('#btn1').prop('disabled', true);
              $('#btn1').css('opacity', '0.5');
            }
          } else if (response.status === 'warning') {
            $('#stockStatus').html('<span class="text-warning"><i class="fas fa-exclamation-triangle"></i> ' + response.message + '</span>');

            if (response.quantity <= 0) {
              $('#btn1').prop('disabled', true);
              $('#btn1').css('opacity', '0.5');
            }
          } else {
            $('#stockStatus').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i> Không có thông tin tồn kho</span>');
            $('#btn1').prop('disabled', true);
            $('#btn1').css('opacity', '0.5');
          }
        },
        error: function() {
          $('#stockStatus').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i> Lỗi kiểm tra tồn kho</span>');
        }
      });
    }

    // Xử lý nút tăng giảm số lượng
    var input = document.getElementById('input');
    var plus = document.getElementById('plus');
    var minus = document.getElementById('minus');

    plus.addEventListener('click', function() {
      var currentValue = parseInt(input.value);
      if (currentValue < 10) {
        input.value = currentValue + 1;
      } else {
        alert('Số lượng tối đa cho mỗi sản phẩm là 10.');
        input.value = 10;
      }
    });

    minus.addEventListener('click', function() {
      var currentValue = parseInt(input.value);
      if (currentValue > 1) {
        input.value = currentValue - 1;
      }
    });

    // Giới hạn số lượng khi nhập trực tiếp vào ô input
    input.addEventListener('change', function() {
      var currentValue = parseInt(input.value);
      if (currentValue > 10) {
        alert('Số lượng tối đa cho mỗi sản phẩm là 10.');
        input.value = 10;
      } else if (currentValue < 1 || isNaN(currentValue)) {
        input.value = 1;
      }
    });
  });
</script>