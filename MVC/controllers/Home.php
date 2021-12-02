<?php
class Home extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Product = $this->model("ProductModel");
    $this->view("master1", [
      "Page" => "home",
      "showProduct" => $Product->ListAllAdmin()
    ]);
  }

  function product($id)
  {
    $Product = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "product",
      "showProductItem" => $Product->ListItemProduct($id),
      "showPrice" => $Product->showPrice($id),
    ]);
  }

  function login()
  {
    $Models = $this->model("HomeModel");
    $this->view("master3", [
      "Page" => "login1",
    ]);
  }
  function loginAction(){
    $Login = $this->model("UserModel");
    $kq = $Login->Login();
  }

  function thucdon()
  {
    $Models = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "list_product",
    ]);
  }

  function checkout()
  {
    $Models = $this->model("HomeModel");
    $this->view("master2", [
      "Page" => "checkout",
    ]);
  }
  function history()
  {
    $Models = $this->model("HomeModel");
    $this->view("master2", [
      "Page" => "history",
    ]);
  }

  function user()
  {
    $Models = $this->model("HomeModel");
    $this->view("master3", [
      "Page" => "user",
    ]);
  }

  function RegisterAction()
  {
    $register = $this->model("UserModel");
    $kq = $register->register();
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
        if ($_SESSION['giohang'][$i][1] == $id AND $_SESSION['giohang'][$i][0] == $size) {
          $check = 1;
          $numNew = $num + $_SESSION['giohang'][$i][2];
          $_SESSION['giohang'][$i][2] = $numNew;
          break;
        }
      }
      if ($check == 0) {
        $cartList = [$size, $id, $num, $price, $thumbnail,$name];
        $_SESSION['giohang'][] = $cartList;
        // header("Location: " . $_SERVER["HTTP_REFERER"]);
      }
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
  }


}
