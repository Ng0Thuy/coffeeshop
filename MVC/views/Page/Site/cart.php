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
                        <th width="200px">Số lượng</th>
                        <th width="200px">Giá tiền</th>
                        <th width="200px">Tổng giá</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="img-name"><img src="https://tocotocotea.com/wp-content/uploads/2021/11/Grass-Jelly-Milk-Coffee.png" alt=""><a href="">Grass Jelly Milk Coffee</a></td>
                        <td><span class="size-cart">X</span></td>
                        <td><input class="numCart" type="number" value="3"></td>
                        <td>100.000 VNĐ</td>
                        <td>100.000 VNĐ</td>
                        <td>
                            <a href=""><i class="far fa-trash-alt tooltip"><span class="tooltiptext">Xóa</span></i></a>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="img-name"><img src="https://tocotocotea.com/wp-content/uploads/2021/11/Royal-Pearl-Milk-Coffee.png" alt=""><a href="">Royal Pearl Milk Coffee</a></td>
                        <td><input class="numCart" type="number" value="1"></td>
                        <td>100.000 VNĐ</td>
                        <td>100.000 VNĐ</td>
                        <td>
                            <a href=""><i class="far fa-trash-alt tooltip"><span class="tooltiptext">Xóa</span></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="img-name"><img src="https://tocotocotea.com/wp-content/uploads/2021/01/ezgif.com-gif-maker-21.jpg" alt=""><a href="">Trà Sữa Kim Cương Đen Okinawa</a></td>
                        <td><input class="numCart" type="number" value="1"></td>
                        <td>100.000 VNĐ</td>
                        <td>100.000 VNĐ</td>
                        <td>
                            <a href=""><i class="far fa-trash-alt tooltip"><span class="tooltiptext">Xóa</span></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="img-name"><img src="https://tocotocotea.com/wp-content/uploads/2021/11/Grass-Jelly-Milk-Coffee.png" alt=""><a href="">Grass Jelly Milk Coffee</a></td>
                        <td><input class="numCart" type="number" value="3"></td>
                        <td>100.000 VNĐ</td>
                        <td>100.000 VNĐ</td>
                        <td>
                            <a href=""><i class="far fa-trash-alt tooltip"><span class="tooltiptext">Xóa</span></i></a>
                        </td>
                    </tr> -->
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
                    <p class="text-red font-bold">1000.000 VNĐ</p>
                </div>
                <div class="price-total">
                    <p>Tổng đơn hàng</p>
                    <p class="text-red font-bold">1000.000 VNĐ</p>
                </div>
                <a class="checkout-btn" href="">Tiến hành thanh toán</a>
            </div>
        </section>
    </section>

</main>