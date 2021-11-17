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
        <a href="" class="menu-item__link">
          THỰC ĐƠN
          <i class="icon-down ti-angle-down"></i>
        </a>
        <ul class="children-list">
          <li class="children-item">
            <a class="children-link" href="">Trà sữa</a>
          </li>
          <li class="children-item">
            <a class="children-link" href="">Coffee</a>
          </li>
          <li class="children-item">
            <a class="children-link" href="">Đồ ăn</a>
          </li>
          <li class="children-item">
            <a class="children-link" href="">Đồ ăn</a>
          </li>
          <li class="children-item">
            <a class="children-link" href="">Đồ ăn</a>
          </li>
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
    <ul class="menu-list-2">
      <li class="menu-item">
        <a href="" class="cart">
          <!-- <i class="cart-icon ti-shopping-cart"></i> -->
          <i class="cart-icon fas fa-shopping-cart"></i>
          <span class="cart-notice">3</span>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="btn login">ĐĂNG NHẬP</a>
        <div class="login-children" onclick="loginOnclick()">
          <div class="my-account">
            <span class="user-name">Nguyễn Quang Dzũ</span>
            <i class="icon-down ti-angle-down"></i>
          </div>
          <ul class="login-children__list" onblur="loginOnblur()">
            <li class="login-item">
              <a class="login-link" href="">
                <!-- <i class="fas fa-user-circle"></i> -->
                Tài khoản của tôi
              </a>
            </li>
            <li class="login-item">
              <a class="login-link" href="">
                <!-- <i class="fas fa-lock"></i> -->
                Đổi mật khẩu
              </a>
            </li>
            <li class="login-item">
              <a class="login-link" href="">
                Đăng xuất
                <i class="fas fa-chevron-circle-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <div class="banner-children">
    <div class="banner-children-main">
      <div class="banner-children__text">
        <p class="banner-children__text-1">ĐẶT MÓN NÀO</p>
        <p class="banner-children__text-2">CŨNG FREE SHIP</p>
      </div>
      <form class="search" method="" action="">
        <i class="search-icon fas fa-search"></i>
        <input type="text" class="search-input" name="" id="" placeholder="Tìm đồ ăn hoặc thức uống mà bạn thích...">
      </form>
    </div>
  </div>
</header>