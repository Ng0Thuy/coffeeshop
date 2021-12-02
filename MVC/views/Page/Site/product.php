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
  <?php
  // session_destroy();
  if (isset($_SESSION['userlogin'])) {
    echo "đã có giỏ hàng";
    var_dump($_SESSION['giohang']);
  }
  ?>
  <div class="card mt-1">
    <!-- card left -->
    <div class="product-imgs">
      <div class="img-display">
        <div class="img-showcase">
          <a href="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>">
            <img src="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>" alt="">
          </a>
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
            <p class="new-price price-bg <?= $item['size'] ?>" hidden name="<?= $item['price'] ?>" style="font-size: 3rem;"><?= number_format($item['price'], 0, ",", ".") ?> VNĐ</p>
          <?php
          }
          ?>
          <p class="new-price price-bg" id="priceSize" name="<?= $row['size'] ?>" style="font-size: 3rem;"><?= number_format($row['price'], 0, ",", ".") ?> VNĐ</p>
          <p class="new-price slogan" style="font-size: 16px;">Ở đâu rẻ hơn, Meta Coffee hoàn tiền</p>
        </div>
        <div class="product-detail">
          <ul class="product-detail__list">
            <li class="product-detail__item">Danh mục: <span><?= $row['category_name'] ?></span></li>
            <li class="product-detail__item">Tình trạng: <span>Còn hàng</span></li>
            <li class="product-detail__item">Vận chuyển: <span>Có</span></li>
          </ul>
        </div>
        <div class="purchase-info">
          <!-- <button name="sizeS" value="S" class="size">S</button>
        <button name="sizeM" class="size">M</button>
        <button name="sizeL" class="size">L</button> -->
          <span class="giapos"></span>
          <input class="sizes" name="size" checked type="radio" value="Nhỏ" id="sizeNho">
          <label for="sizeNho">Nhỏ</label>
          <input class="sizes" name="size" type="radio" value="Vừa" id="sizeVua">
          <label for="sizeVua">Vừa</label>
          <input class="sizes" name="size" type="radio" value="Lớn" id="sizeLon">
          <label for="sizeLon">Lớn</label>
        </div>
        <div class="purchase-info">
          <span class="btn" id="minus">-</span>
          <input type="number" name="num" min="1" value="1" id="input">
          <span class="btn" id="plus" style="margin-right: 50px;">+</span>
        </div>
        <input type="number" hidden name="id" value="<?= $row['product_id'] ?>">
        <input type="number" hidden id="pricepost" name="price" value="<?= $row['price'] ?>">
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
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat repellat doloribus dolor deleniti facilis temporibus aperiam sint. Omnis eum fuga distinctio vitae rerum, sed laudantium ipsa totam, magnam sapiente consequatur!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fuga rem ipsum atque nam velit deserunt, earum officiis est aliquam recusandae similique fugiat voluptatum cupiditate eius magnam quibusdam unde iste.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ab distinctio culpa quia quas hic, cumque eum est eligendi quam cupiditate repudiandae, reprehenderit soluta inventore labore dignissimos veniam ipsum non?</p>
      </div>
    </div>
    <div class="tab_container_area" id="danhgia">
      <div class="tab_container">
        <h3 class="comment-heading">Bình luận</h3>
        <div class="comment-list">
          <div class="comment">
            <div class="comment-avatar">
              <img src="<?= BASE_URL ?>/MVC/public/images/users/SEIJ6567.JPG" alt="">
            </div>
            <div class="comment-user">
              <div class="comment-user__name">Nguyễn Đăng Thành</div>
              <div class="comment-user__content">Tôi rất thích sản phẩm này</div>
            </div>
          </div>
          <div class="view-more-comments">
            <div class="view-more-comment__text">
              <span>View More Comments</span>
            </div>
            <div class="view-more-comment__quantity">
              <span>3 of 60</span>
            </div>
          </div>
        </div>
        <form action="" method="post" id="formComment">
          <textarea cols="131" rows="4" placeholder="Viết bình luận..."></textarea>
          <input type="text" hidden name="id" value="<?= $row['product_id'] ?>">
          <button type="submitComment">Gửi bình luận</button>
        </form>
      </div>
    </div>
  </div>
  <div class="nhan_container related-products">
    <h2 class="related-products__heading">Sản phẩm liên quan</h2>
    <div class="list-product related-products__list row sm-gutter">
      <div class="col l-2-5 m-4 c-6">
        <a href="<?= BASE_URL ?>/product" class="product-cart">
          <div class="product-cart__tags">
            <div class="tag-new">new</div>
            <div class="tag-discount">30%</div>
          </div>
          <div class="product-cart__img">
            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="">
          </div>
          <div class="product-cart__info">
            <div class="info-title">Sữa chua dâu tằm hoàng kim</div>
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
              <div class="info-origin-price">25,000 đ</div>
              <div class="info-sale-price">30,000 đ</div>
            </div>
            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
          </div>
        </a>
      </div>
      <div class="col l-2-5 m-4 c-6">
        <a href="<?= BASE_URL ?>/product" class="product-cart">
          <div class="product-cart__tags">
            <div class="tag-new">new</div>
            <div class="tag-discount">30%</div>
          </div>
          <div class="product-cart__img">
            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="">
          </div>
          <div class="product-cart__info">
            <div class="info-title">Sữa chua dâu tằm hoàng kim</div>
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
              <div class="info-origin-price">25,000 đ</div>
              <div class="info-sale-price">30,000 đ</div>
            </div>
            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
          </div>
        </a>
      </div>
      <div class="col l-2-5 m-4 c-6">
        <a href="<?= BASE_URL ?>/product" class="product-cart">
          <div class="product-cart__tags">
            <div class="tag-new">new</div>
            <div class="tag-discount">30%</div>
          </div>
          <div class="product-cart__img">
            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="">
          </div>
          <div class="product-cart__info">
            <div class="info-title">Sữa chua dâu tằm hoàng kim</div>
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
              <div class="info-origin-price">25,000 đ</div>
              <div class="info-sale-price">30,000 đ</div>
            </div>
            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
          </div>
        </a>
      </div>
      <div class="col l-2-5 m-4 c-6">
        <a href="<?= BASE_URL ?>/product" class="product-cart">
          <div class="product-cart__tags">
            <div class="tag-new">new</div>
            <div class="tag-discount">30%</div>
          </div>
          <div class="product-cart__img">
            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="">
          </div>
          <div class="product-cart__info">
            <div class="info-title">Sữa chua dâu tằm hoàng kim</div>
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
              <div class="info-origin-price">25,000 đ</div>
              <div class="info-sale-price">30,000 đ</div>
            </div>
            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</main>