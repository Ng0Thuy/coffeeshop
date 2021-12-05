<?php
class Product extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "product",
    ]);
  }

  function name($id)
  {
    $Models = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "product",
      "ShowMenu" => $Category->ListAll(),
    ]);
  }

  function list_product()
  {
    $Models = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "list_product",
      "ShowMenu" => $Category->ListAll(),
    ]);
  }
  
}
