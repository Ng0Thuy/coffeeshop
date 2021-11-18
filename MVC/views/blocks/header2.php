<header class="header">
    <div id="menu-area">
        <div class="logo">
            <a href="#" class="logo__link">
                <img class="logo__img" src="<?= BASE_URL ?>/MVC/public/images/metacoffee.png" alt="Logo-ToCoToCo" />
            </a>
        </div>
        <ul class="menu-list">
            <li class="menu-item active">
                <a href="" class="menu-item__link">TRANG CHỦ</a>
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
            <li class="menu-item">
                <a href="" class="cart"><i class="cart-icon ti-shopping-cart"></i>
                    <span class="cart-notice">3</span></a>
            </li>
            <li class="menu-item">
                <!-- <a href="" class="login">ĐĂNG NHẬP</a> -->

                <!-- User -->
                <div class="login-children" onclick="loginOnclick()">
                    <div class="my-account">
                        <span class="user-name text-white">Nguyễn Đăng Thành</span>
                        <i class="icon-down ti-angle-down text-white"></i>
                    </div>
                    <ul class="login-children__list" onblur="loginOnblur()">
                        <li class="login-item">
                            <a class="login-link" href="">
                                Tài khoản của tôi
                            </a>
                        </li>
                        <li class="login-item">
                            <a class="login-link" href="">
                                Đổi mật khẩu
                            </a>
                        </li>
                        <li class="login-item">
                            <a class="login-link" href="">
                                Đăng xuất
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

    <div class="banner">
        <div class="banner-text">
            <h1>ToCoToCo nhấp nhô từng nhịp!!!</h1>
            <a href="#">Learn more</a>
        </div>
    </div>
</header>