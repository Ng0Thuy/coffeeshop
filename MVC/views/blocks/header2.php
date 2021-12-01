<header class="header">
    <div id="menu-areas">
        <div class="logo">
            <a href="<?= BASE_URL ?>" class="logo__link">
                <img class="logo__img" src="<?= BASE_URL ?>/MVC/public/images/metacoffee.png" alt="Logo-ToCoToCo" />
            </a>
        </div>
        <ul class="menu-list">
            <li class="menu-item active">
                <a href="<?= BASE_URL ?>" class="menu-item__link">TRANG CHỦ</a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-item__link">THỰC ĐƠN <i class="ti-angle-down"></i></a>
                <ul class="menu-children">
                    <li class="children-item"><a href="">Trà sữa</a></li>
                    <li class="children-item"><a href="">Cà phê</a></li>
                    <li class="children-item"><a href="">Thức ăn nhanh</a></li>
                    <li class="children-item"><a href="">Đồ uống chai</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="" class="menu-item__link">TIN TỨC</a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-item__link">GIỚI THIỆU</a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-item__link">LIÊN HỆ</a>
            </li>
        </ul>
        <ul class="menu-list2">
            <li class="menu-item2">
                <a href="" class="cart"><i class="cart-icon ti-shopping-cart"></i>
                    <span class="cart-notice">3</span></a>
            </li>
            <li class="menu-item2">
                <!-- <a href="" class="login">ĐĂNG NHẬP</a> -->

                <!-- User -->
                <div class="login-children" onclick="loginOnclick()">
                    <div class="my-account">
                        <span class="user-name text-white">Nguyễn Đăng Thành</span>
                        <i class="icon-down ti-angle-down text-white"></i>
                    </div>
                    <ul class="login-children__list" onblur="loginOnblur()">
                        <li class="login-item">
                            <a class="login-link" href="<?= BASE_URL ?>/home/user">
                                <i class="fas fa-user"></i>Tài khoản của tôi
                            </a>
                        </li>
                        <li class="login-item">
                            <a class="login-link" href="">
                                <i class="fas fa-key"></i>Đổi mật khẩu
                            </a>
                        </li>
                        <li class="login-item">
                            <a class="login-link" href="">
                                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- User -->
            </li>
        </ul>
        <div class="search">

        </div>
    </div>

    <div class="banners">
        <img src="http://localhost/DuAn1/MVC/public/images/bg-con.png" alt="">
        <div class="banner-texts">
            <h1 class="text-black">Đặt món nào</h1>
            <p class="text-red">Cùng free ship</p>
            <form action="" id="search-bn">
                <i class="fas fa-search search-bn"></i>
                <input class="search-sp" type="text" placeholder="Tìm đồ ăn hoặc nước uống mà bạn thích...">
            </form>
        </div>
    </div>
</header>