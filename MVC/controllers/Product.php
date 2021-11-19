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
  function abc()
  {
    $Models = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "product",
    ]);
  }
  
}
