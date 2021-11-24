<?php
class Admin extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("HomeModel");
    $this->view("masterAdmin", [
      "Page" => "home",
    ]);
  }

  function category()
  {
    $Models = $this->model("HomeModel");
    $this->view("masterAdmin", [
      "Page" => "category",
    ]);
  }
  function product()
  {
    $Models = $this->model("HomeModel");
    $this->view("masterAdmin", [
      "Page" => "product",
    ]);
  }
}
