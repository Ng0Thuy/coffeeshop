<main class="grid wide container">
    <nav class="nav-top">
        <ul>
            <li><a href=""><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="">Thực đơn</a></li>
        </ul>
    </nav>
    <div class="row sm-gutter app__content">
        <form method="GET" action="" class="col l-2-4">
            <div class="slidebar">
                <div class="slidebar-menu">
                    <h3 class="slidebar-menu__heading">Thực đơn</h3>
                    <div class="slidebar-menu__category">
                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="trasua">
                                <i class="icon-checkbox"></i>
                                <span  class="category-name">Trà sữa</span>
                            </label>
                        </div>
                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="">
                                <i class="icon-checkbox"></i>
                                <span class="category-name">Trà nguyên chất</span>
                            </label>
                        </div>

                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="">
                                <i class="icon-checkbox"></i>
                                <span class="category-name">Cà phê</span>
                            </label>
                        </div>


                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="">
                                <i class="icon-checkbox"></i>
                                <span class="category-name">Nước trái cây</span>
                            </label>
                        </div>

                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="">
                                <i class="icon-checkbox"></i>
                                <span class="category-name">Thức uống đá xay</span>
                            </label>
                        </div>

                        <div class="category-item">
                            <label class="checkbox">
                                <input type="checkbox" name="">
                                <i class="icon-checkbox"></i>
                                <span class="category-name">Topping</span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="slidebar-filter__price">
                    <h3 class="slidebar-filter__price-heading">Giá</h3>
                    <div class="price-slider">
                        <span>
                            from
                            <input type="number" value="20000" min="20000" max="200000" />
                            to
                            <input type="number" value="150000" min="20000" max="200000" />
                        </span>
                        <input color="#FFA8A8" value="20000" min="20000" max="200000" step="5000" type="range" />
                        <input value="150000" min="20000" max="200000" step="5000" type="range" />
                        <svg width="100%" height="5">
                            <!-- <line x1="4" y1="0" x2="300" y2="0" stroke="#212121" stroke-width="12" stroke-dasharray="1 28"></line> -->
                        </svg>
                    </div>
                </div>

                <div class="slidebar-product-size">
                    <h3 class="product-size__heading">Kích thước</h3>
                    <div class="product-size__list">
                        <div class="product-size__item">
                            <span class="product-size__text">Lớn</span>
                        </div>
                        <div class="product-size__item">
                            <span class="product-size__text">Vừa</span>
                        </div>
                        <div class="product-size__item">
                            <span class="product-size__text">Nhỏ</span>
                        </div>
                    </div>
                </div>

                <div class="slidebar-favorite-product">
                    <div class="favorite-product__title">
                        <h3 class="favorite-product__heading">Yêu thích nhất</h3>
                        <!-- <div class="favorite-product__toggle">
                            <i class="toggle-icon fas fa-arrow-left"></i>
                            <i class="toggle-icon fas fa-arrow-right"></i>
                        </div> -->
                    </div>
                    <div class="favorite-product__list">
                        <a class="favorite-product__item" href="">
                            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="" class="favorite-product__img">
                            <div class="favorite-product__info">
                                <div class="favorite-product__name">Sữa tươi chân trâu</div>
                                <div class="favorite-product__rating">
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                </div>
                                <div class="favorite-product__price">45,000 đ</div>
                            </div>
                        </a>
                        <a class="favorite-product__item" href="">
                            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="" class="favorite-product__img">
                            <div class="favorite-product__info">
                                <div class="favorite-product__name">Sữa tươi chân trâu</div>
                                <div class="favorite-product__rating">
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                </div>
                                <div class="favorite-product__price">45,000 đ</div>
                            </div>
                        </a>
                        <a class="favorite-product__item" href="">
                            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="" class="favorite-product__img">
                            <div class="favorite-product__info">
                                <div class="favorite-product__name">Sữa tươi chân trâu</div>
                                <div class="favorite-product__rating">
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                </div>
                                <div class="favorite-product__price">45,000 đ</div>
                            </div>
                        </a>
                        <a class="favorite-product__item" href="">
                            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="" class="favorite-product__img">
                            <div class="favorite-product__info">
                                <div class="favorite-product__name">Sữa tươi chân trâu</div>
                                <div class="favorite-product__rating">
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                </div>
                                <div class="favorite-product__price">45,000 đ</div>
                            </div>
                        </a>
                        <a class="favorite-product__item" href="">
                            <img src="<?= BASE_URL ?>/MVC/public/images/products/choco-creamcake.png" alt="" class="favorite-product__img">
                            <div class="favorite-product__info">
                                <div class="favorite-product__name">Sữa tươi chân trâu</div>
                                <div class="favorite-product__rating">
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                    <i class="rating-icon fas fa-star"></i>
                                </div>
                                <div class="favorite-product__price">45,000 đ</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <div class="col l-9 ml-auto">
            <div class="product-all__title">
                <h3 class="product-all_heading">Tất cả sản phẩm</h3>
                <div class="product-all__filter">
                    <p>Lọc theo: <span>A - Z</span> </p>
                    <p><span>50</span> sản phẩm</p>
                </div>
            </div>
            <div class="product-all-list">
                <div class="list-product">
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
                                <p class="rating-text">(1002 đánh giá)</p>
                            </div>
                            <div class="info-price">
                                <div class="info-origin-price">25,000 đ</div>
                                <div class="info-sale-price">30,000 đ</div>
                            </div>
                            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
                        </div>
                    </a>
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
                                <p class="rating-text">(25 đánh giá)</p>
                            </div>
                            <div class="info-price">
                                <div class="info-origin-price">25,000 đ</div>
                                <div class="info-sale-price">30,000 đ</div>
                            </div>
                            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
                        </div>
                    </a>
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
                                <p class="rating-text">(52 đánh giá)</p>
                            </div>
                            <div class="info-price">
                                <div class="info-origin-price">25,000 đ</div>
                                <div class="info-sale-price">30,000 đ</div>
                            </div>
                            <div class="btn btn--primary btn-order-product">Đặt hàng</div>
                        </div>
                    </a>
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
                <div class="btn btn--primary btn-view-all" style="padding: 0;"><a href="">Xem thêm</a></div>
            </div>

        </div>
    </div>

    </div>
</main>