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
    $Category = $this->model("CategoryModel");
    $this->view("masterAdmin", [
      "Page" => "category",
      "ShowCategory" => $Category->ListAll()
    ]);
  }

  function editCategory($id)
  {
    $Category = $this->model("CategoryModel");
    $Category->checkid($id);
    $this->view("masterAdmin", [
      "Page" => "editcategory",
      "ShowEdit" => $Category->ListItem($id)
    ]);
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
      $Category->editcategory($id, $name);
    }
  }

  function addCategory()
  {
    $Category = $this->model("CategoryModel");
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }
    $Category->addCategory($name);
  }

  function deleteCategory()
  {
    $Category = $this->model("CategoryModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $Category->deleteCategory($id);
            }
            break;
        }
      }
    }
  }


  function product()
  {
    $Category = $this->model("CategoryModel");
    $Models = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "product",
      "ShowCategory" => $Category->ListAll()
    ]);
  }

  // Thêm sản phẩm
  function addProduct(){
    $Product = $this->model("ProductModel");
    $Add = $Product->add();
  }



}
