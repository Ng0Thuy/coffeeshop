<?php
class Home extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    $Models = $this->model("HomeModels");
    $this->view("master", [
      "Page" => "home",
    ]);
  }
}
