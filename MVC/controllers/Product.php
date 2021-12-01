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
    $this->view("master2", [
      "Page" => "product",
    ]);
  }

  function list_product()
  {
    $Models = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "list_product",
    ]);
  }
  
}
