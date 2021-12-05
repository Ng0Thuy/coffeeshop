<?php
class Home extends Controller
{
  public function __construct()
  {
    
  }

  function Default()
  {
    // session_destroy();
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master1", [
      "Page" => "home",
      "showProduct" => $Product->ListAllAdmin(),
      "showProductSelling" => $Product->showProductSelling(),
      "ShowMenu" => $Category->ListAll(),
    ]);
  }

  function product($id)
  {
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "product",
      "showProductItem" => $Product->ListItemProduct($id),
      "showPrice" => $Product->showPrice($id),
      "showComment" => $Product->showComment($id),
      "showSize" => $Product->showPrice($id),
      "ShowMenu" => $Category->ListAll(),
      "ProductRelated" => $Product->ProductRelated($id),
    ]);
  }

  function login()
  {
    $Models = $this->model("HomeModel");
    $this->view("master3", [
      "Page" => "login1",
    ]);
  }
  function loginAction()
  {
    $Login = $this->model("UserModel");
    $kq = $Login->Login();
  }

  function thucdon()
  {
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "list_Product",
      "showMenu" => $CategoryModel->ListAll(),
      "showAll" => $ProductModel->ListAll(),
      "showNum" => $ProductModel->showNum(),
      "ListAllAdmin" => $ProductModel->ListAllAdmin(),
      "ShowMenu" => $CategoryModel->ListAll(),

    ]);
  }

  function danhmuc($id){
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "list_Product",
      "showMenu" => $CategoryModel->ListAll(),
      "ListItemId" => $ProductModel->ListItemId($id),
      "showNum" => $ProductModel->showNumId($id),
      "ListAllCt" => $ProductModel->ListAllCt($id),
      "ShowMenu" => $CategoryModel->ListAll(),
      "ShowName" => $CategoryModel->ListItem($id),
    ]);
  }

  function search(){
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    if(isset($_POST['search'])){
      $id = $_POST['search'];
    }
    $this->view("master2", [
      "Page" => "list_Product",
      "showMenu" => $CategoryModel->ListAll(),
      "ShowMenu" => $CategoryModel->ListAll(),
      "ListSearch" => $ProductModel->ListSearch($id),
      "ListNumSearch" => $ProductModel->ListNumSearch($id),
    ]);
  }
  
  function checkout()
  {
    // if (sizeof($_SESSION['giohang']) == 0) {
      if(!isset($_SESSION['giohang'])){
      echo '
            <script>
                alert("Chưa có sản phẩm trong giỏ hàng")
                window.location.assign("../");
            </script>
        ';
    }

    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      echo '
            <script>
                alert("Vui lòng đăng nhập để tiến hành đặt hàng")
                window.location.assign("../");
            </script>
        ';
    }
    $User = $this->model("UserModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "checkout",
      "showUserCheckout" => $User->showUserCheckout($user_id),
      "ShowMenu" => $Category->ListAll(),

    ]);
  }

  function checkoutAct()
  {
    $Product = $this->model("ProductModel");
    $checkoutAct = $Product->checkoutAct();
  }

  function history()
  {
    if(isset($_SESSION['userlogin'])){
      $id = $_SESSION['userlogin'][3];
    }
    else{
      $id ="1";
    }
    $ProductModel = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "history",
      "showHistoty" => $ProductModel->showHistoty($id),
      "ShowMenu" => $Category->ListAll(),

    ]);
  }
  function historyDetails($id)
  {
    $ProductModel = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "historyDetails",
      "showHistoryDetails" => $ProductModel->showHistoryDetails($id),
      "ShowMenu" => $Category->ListAll(),

    ]);
  }

  function user()
  {
    $Models = $this->model("HomeModel");
    $Category = $this->model("CategoryModel");
    $this->view("master3", [
      "Page" => "user",
      "ShowMenu" => $Category->ListAll(),

    ]);
  }

  function RegisterAction()
  {
    $register = $this->model("UserModel");
    $kq = $register->register();
  }
  function commentAction()
  {
    $comment = $this->model("UserModel");
    $kq = $comment->comment();
  }
  function loadComment()
  {
    $comment = $this->model("UserModel");
    $kq = $comment->loadComment();
  }

  function AddToCart()
  {
    if (!isset($_SESSION['giohang'])) {
      $_SESSION['giohang'] = [];
    }

    if (isset($_POST["addToCart"])) {
      $num = $_POST['num'];
      $size = $_POST['size'];
      $id = $_POST['id'];
      $thumbnail = $_POST['thumbnail'];
      $price = $_POST['price'];
      $name = $_POST['name'];

      // kiểm tra sp có chưa, nếu có thì cột số lượng
      $check = 0;
      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $id and $_SESSION['giohang'][$i][0] == $size) {
          $check = 1;
          $numNew = $num + $_SESSION['giohang'][$i][2];
          $_SESSION['giohang'][$i][2] = $numNew;
          break;
        }
      }
      if ($check == 0) {
        $cartList = [$size, $id, $num, $price, $thumbnail, $name];
        $_SESSION['giohang'][] = $cartList;
        // header("Location: " . $_SERVER["HTTP_REFERER"]);
      }
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
  }
}
