<?php
class Cart extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Product = $this->model("ProductModel");
    if (isset($_SESSION['giohang'])) {
      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
          $num = $_SESSION['giohang'][$i][2];
          $size = $_SESSION['giohang'][$i][0];
          $id = $_SESSION['giohang'][$i][1];
      }
  }
    $this->view("master2", [
      "Page" => "cart",
    ]);
  }

  function deldCart($id)
  {
    array_splice($_SESSION['giohang'], $id, 1);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }

  
}
