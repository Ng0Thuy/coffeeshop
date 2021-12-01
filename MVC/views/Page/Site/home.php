<article class="article">
    <div class="grid wide">
        <!-- Featured Products -->
        <div class="featured-products row">
            <div class="featured-product__title">
                <div class="text-1">
                    Meta Coffee Menu
                </div>
                <div class="text-2 line-bottom">
                    SẢN PHẨM NỔI BẬT
                </div>
                <div class="icon-bottom-title">
                </div>
            </div>

            <div class="featured-product__content">
                <div class="list-product row sm-gutter">
                    <?php
                    while ($row = mysqli_fetch_array(($data['showProduct']))) {
                    ?>
                        <div class="col l-2-5 m-4 c-6">
                            <a href="<?= BASE_URL ?>/home/product/<?=$row['product_id']?>" class="product-cart">
                                <div class="product-cart__tags">
                                    <div class="tag-new">new</div>
                                    <?php
                                    if ($row['price_sale'] > 0) {
                                    ?>
                                        <div class="tag-discount"><?= $row['price_sale'] ?>%</div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="product-cart__img">
                                    <img src="<?= BASE_URL ?>/<?= $row['thumbnail'] ?>" alt="">
                                </div>
                                <div class="product-cart__info">
                                    <div class="info-title"><?= $row['product_name'] ?></div>
                                    <div class="info-rating">
                                        <div class="rating-list">
                                            <i class="rating-icon fas fa-star"></i>
                                            <i class="rating-icon fas fa-star"></i>
                                            <i class="rating-icon fas fa-star"></i>
                                            <i class="rating-icon fas fa-star"></i>
                                            <i class="rating-icon fas fa-star"></i>
                                        </div>
                                        <p class="rating-text">(10 đánh giá)</p>
                                    </div>
                                    <div class="info-price">
                                        <div class="info-origin-price"><?= number_format($row['price'], 0, ",", ".") ?> VNĐ</div>
                                        <?php
                                        if ($row['price_sale'] > 0) {
                                            $price = $row['price'];
                                            $sale = $row['price_sale'];
                                            $price_sale = $sale % $price;
                                            $priceTop = $price + $price_sale;
                                        ?>
                                            <div class="info-sale-price"><?= number_format($priceTop, 0, ",", ".") ?> VNĐ</div>
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
                    ?>



                    <!-- <div class="col l-2-5 m-4 c-6">
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
                                </div>
                                <div class="info-price">
                                    <div class="info-origin-price">25,000 đ</div>
                                    <div class="info-sale-price">30,000 đ</div>
                                </div>
                                <div class="btn btn--primary btn-order-product">Đặt hàng</div>
                            </div>
                        </a>
                    </div> -->
                </div>
                <div class="btn btn--primary btn-view-all" style="padding: 0;"><a href="#">Xem tất cả</a></div>
            </div>
        </div>


        <!-- Product bán chạy -->
        <div class="featured-products pt-2">
            <div class="featured-product__title">
                <div class="text-2 line-bottom">
                    SẢN PHẨM BÁN CHẠY
                </div>
                <div class="icon-bottom-title">
                </div>
            </div>

            <div class="featured-product__content">
                <div class="list-product row sm-gutter">
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                                    <p class="rating-text">(10 đánh giá)</p>
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
                <div class="btn btn--primary btn-view-all" style="padding: 0;"><a href="">Xem tất cả</a></div>
            </div>
        </div>
        <!-- Slider -->
        <div class="slider">
            <div class="slider-list" id="sliders">
                <img class="slider-item" src="<?= BASE_URL ?>/MVC/public/images/slider.png" alt="">
                <!-- <img class="slider-item" src="<?= BASE_URL ?>/MVC/public/images/slider.png" alt="">
                  <img class="slider-item" src="<?= BASE_URL ?>/MVC/public/images/slider.png" alt="">
                  <img class="slider-item" src="<?= BASE_URL ?>/MVC/public/images/slider.png" alt="">
                  <img class="slider-item" src="<?= BASE_URL ?>/MVC/public/images/slider.png" alt=""> -->
            </div>
            <div class="slider-content">
                <h3 class="slider-content__heading">VỀ CHÚNG TÔI</h3>
                <div class="icon-bottom-title"></div>
                <div class="slider-content__text">Bên cạnh niềm tự hào về những ly trà sữa ngon – sạch – tươi, chúng tôi luôn tự tin mang đến khách hàng những trải nghiệm tốt nhất về dịch vụ và không gian.</div>
                <div class="btn btn--primary slider-content__btn">Xem thêm</div>
            </div>
        </div>
    </div>
</article>