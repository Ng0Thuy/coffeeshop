<?php
class Product extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("ProductModels");
    $this->view("master", [
      "Page" => "product",
    ]);
  }
  
}
