<div id="nhan">
  <div class="breadcrumb">
        <ul>
          <li class="item-link"><a href="#"><i class="fas fa-home"></i> Trang chủ</a></li>
          <li class="item-link"><span>Chi tiết</span></li>
        </ul>
      </div>
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "<?= BASE_URL ?>/MVC/public/images/products/trasua.png" alt = "">
              
            </div>
          </div>
          
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h5 class = "product-title">Tên sản phẩm</h5>

          <div class = "product-price">
            <p class = "new-price" style="font-size: 18px;">55.000 đ</p>
            <p class = "new-price" style="font-size: 12px;">Rẻ hơn hoàn tiền...</p>
          </div>

          <div class = "product-detail">
            <ul>
              <li>Danh mục: <span>Trà sữa</span></li>
              <li>Tình trạng: <span>Còn hàng</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
            <button class="btn" id="minus">-</button>
            <input type = "number" readonly min = "1" value = "1" id="input">
            <button class="btn" id="plus" style ="margin-right: 50px;">+</button>
            <button class="size">S</button>
            <button class="size">M</button>
            <button class="size">L</button>
          </div>

          <div class="click">
            <a href="#"><button type = "button" id = "btn1"><i class = "fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
            <a href="#"><button type = "button" id = "btn2">Đặt hàng ngay</button></a>
          </div>
        </div>
      </div>
      <div class="nhan_container">
            <ul class="tab_navigation">
                <li>Mô tả</li>
                <li>Đánh giá</li>
            </ul>
            <div class="tab_container_area">
                <div class="tab_container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat repellat doloribus dolor deleniti facilis temporibus aperiam sint. Omnis eum fuga distinctio vitae rerum, sed laudantium ipsa totam, magnam sapiente consequatur!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fuga rem ipsum atque nam velit deserunt, earum officiis est aliquam recusandae similique fugiat voluptatum cupiditate eius magnam quibusdam unde iste.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ab distinctio culpa quia quas hic, cumque eum est eligendi quam cupiditate repudiandae, reprehenderit soluta inventore labore dignissimos veniam ipsum non?</p>
                </div>
                <div class="tab_container">
                    <h3>Bình luận</h3>
                    <form action="" method="post">
                      <textarea cols="131" rows="10" placeholder="Viết bình luận..."></textarea>
                      <button type="submit">Gửi bình luận</button>
                    </form>
                </div>
            </div>
        </div>
</div>