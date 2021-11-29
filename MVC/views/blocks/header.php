<header class="header">

  <div id="menu-area">
    <nav class="nav-tablet-mobile" id="nav-tablet-mobile">
    <button class="nav-tablet-mobile__icon" id="toggle">
        <div class="line line1"></div>
        <div class="line line2"></div>
      </button>

      <ul>
        <li><a href="#">TRANG CHỦ</a></li>
        <li><a href="#">THỰC ĐƠN</a></li>
        <li><a href="#">TIN TỨC</a></li>
        <li><a href="#">GIỚI THIỆU</a></li>
        <li><a href="#">LIÊN HỆ</a></li>
      </ul>
      
    </nav>
    
    <div class="logo">
      <a href="<?= BASE_URL ?>" class="logo__link">
        <img class="logo__img" src="<?= BASE_URL ?>/MVC/public/images/metacoffee.png" alt="Logo-ToCoToCo" />
      </a>
    </div>
    <ul class="menu-list hide-on-tablet-mobile">
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
        <a href="<?= BASE_URL ?>/cart" class="cart"><i class="cart-icon ti-shopping-cart"></i>
          <span class="cart-notice">3</span></a>
      </li>
      <li class="menu-item2">
        <span class="login" id="login-tab">ĐĂNG NHẬP</span>
      </li>
    </ul>
    <div class="search">

    </div>
  </div>

  <div class="banner">
    <div class="banner-text">
      <h1>Đậm vị thiên nhiên<br>hạnh phúc trọn đời!</h1>
      <p>Với sứ mệnh mang tới niềm vui và hạnh phúc, Meta Coffee hy vọng sẽ tạo nên <br> một nét văn hóa giải trí bên cạnh ly trà sữa Ngon – sạch – tươi</p>
      <form action="" id="search-bn-home">
        <i class="fas fa-search search-bn"></i>
        <input class="search-bn-home" type="text" placeholder="Tìm đồ ăn hoặc nước uống mà bạn thích...">
      </form>
    </div>
  </div>
</header>