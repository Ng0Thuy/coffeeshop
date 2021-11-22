<?php
class Cart extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("HomeModel");
    $this->view("master2", [
      "Page" => "cart",
    ]);
  }
}
