<main class="container">
    <nav class="nav-top">
        <ul>
            <li><a href=""><i class="fas fa-home"></i>Trang chủ</a></li><span>/</span>
            <li><a href="">Lịch sử mua hàng</a></li>
        </ul>
    </nav>
    <section class="product-carts">
        <h1 class="product-carts_title">Lịch sử mua hàng</h1>
        <section class="cart-list">
            <table class="table-cart">
                <thead>
                    <tr class="title-table">
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th width="200px">Số điện thoại</th>
                        <th width="200px">Trạng thái</th>
                        <th width="200px">Thời gian</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($history = mysqli_fetch_array($data['showHistoty'])) {
                    ?>
                        <tr>
                            <td class="img-name">Nguyễn Đăng Thành</td>
                            <td><span class="size-cart"><?= $history['address'] ?></span></td>
                            <td><?= $history['phone'] ?></td>
                            <td><?= $history['order_date'] ?></td>
                            <td class="success"><?= $history['status'] ?></td>
                            <td class="success"><a href="<?=BASE_URL?>/Home/historyDetails/<?=$history['order_id']?>">Xem</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- </section>
        <nav aria-label="">
            <ul class="pagination pt-2">
                <li class="page-item ">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item" aria-current="page">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section> -->

</main>