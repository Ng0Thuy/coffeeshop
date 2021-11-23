<?php
class Home extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("HomeModel");
    $this->view("master1", [
      "Page" => "home",
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
}
