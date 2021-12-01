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


}
