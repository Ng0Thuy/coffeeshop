<?php
class Admin extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Models = $this->model("HomeModel");
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $Admin = $this->model("AdminModel");
    $User = $this->model("UserModel");
    $this->view("masterAdmin", [
      "Page" => "home",
      "countCategory" => $Category->countCategory(),
      "countProduct" => $Product->countProduct(),
      "countUser" => $User->countUser(),
      "countOrder" => $Models->countOrder(),
      "countComment" => $Models->countComment(),
      "thongkeChartName" => $Admin->ThongKe(),
      "thongkeChartNum" => $Admin->ThongKe(),
      "ThongKe" => $Admin->ThongKe(),
      "ThongKeOrderName" => $Admin->ThongKeOrder(),
      "ThongKeOrderNum" => $Admin->ThongKeOrder(),
    ]);
  }


  function logout()
  {
    unset($_SESSION['userAdmin']);
    header("Location: http://localhost/DuAn1/Admin/login");
  }

  function login()
  {
    $Category = $this->model("CategoryModel");
    $this->view("masterAdmin", [
      "Page" => "login",
      "countCategory" => $Category->ListAll()
    ]);
  }

  function loginAction()
  {
    $Login = $this->model("UserModel");
    $kq = $Login->LoginAdmin();
  }

  function category()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $this->view("masterAdmin", [
      "Page" => "category",
      "ShowCategory" => $Category->ListAll()
    ]);
  }

  function editCategory($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
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
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }
    $Category->addCategory($name);
  }

  function deleteCategory()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
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
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $Models = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "product",
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListAllAdmin(),
    ]);
  }

  // Thêm sản phẩm
  function addProduct()
  {
    $Product = $this->model("ProductModel");
    $Add = $Product->add();
  }

  // Sửa sản phẩm
  function editProduct($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    // $Category->checkid($id);
    $this->view("masterAdmin", [
      "Page" => "editProduct",
      "ShowEdit" => $Product->ListItem($id),
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListItem($id),
      "ShowVariant" => $Product->ShowVariant($id),
    ]);
  }
  function editProductAct()
  {
    $Product = $this->model("ProductModel");
    $Add = $Product->edit();
  }

  function deleteProduct()
  {
    $Product = $this->model("ProductModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $Product->deleteProduct($id);
              $Product->deleteVariant($id);
            }
            break;
        }
      }
    }
  }

  // USER

  function user()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $UserModel = $this->model("UserModel");
    $Models = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "user",
      "showUser" => $UserModel->ListUserRole(),
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListAllAdmin(),
    ]);
  }

  function editUser($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $UserModel = $this->model("UserModel");
    $this->view("masterAdmin", [
      "Page" => "editUser",
      "ShowEdit" => $UserModel->ListItem($id),
      "showUserItem" => $UserModel->ListItem($id),
      "showRole" => $UserModel->showRole(),
    ]);
  }

  function editUserAct()
  {
    $UserModel = $this->model("UserModel");
    $edit = $UserModel->edit();
  }

  function deleteUser()
  {
    $User = $this->model("UserModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $User->deleteUser($id);
            }
            break;
        }
      }
    }
  }

  // COMMENT
  function comment()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $AdminModel = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "comment",
      "showCommentAd" => $AdminModel->showCommentAd(),
    ]);
  }

  function deleteComment()
  {
    $User = $this->model("UserModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $User->deleteComment($id);
            }
            break;
        }
      }
    }
  }

  // ORDER
  function order()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $AdminModel = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "order",
      "showOrder" => $AdminModel->showOrder(),
    ]);
  }
  function orderDetails($id)
  {
    $ProductModel = $this->model("ProductModel");
    $this->view("masterAdmin", [
      "Page" => "orderdetails",
      "showOrderDetails" => $ProductModel->showHistoryDetails($id),
      "showOrderDetailsID" => $ProductModel->showHistoryDetails($id),
      "showStatus" => $ProductModel->showStatus($id),
    ]);
  }
  function updateOrder($id)
  {
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    }
    $Product = $this->model("ProductModel");
    $Add = $Product->updateOrder($status, $id);
  }

  // Quản lý tồn kho
  function stock()
  {
    // Hiển thị tất cả lỗi PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    try {
      $Stock = $this->model("StockModel");
      $User = $this->model("UserModel");
      $Product = $this->model("ProductModel");
      $Category = $this->model("CategoryModel");
      
      if (isset($_SESSION['userlogin'])) {
        $user_id = $_SESSION['userlogin'][3];
      } else {
        $user_id = "";
      }
      
      $allStock = $Stock->getAllStockGroupByProduct();
      
      $this->view("masterAdmin", [
        "Page" => "stock_management",
        "ShowAllStock" => $allStock,
        "ShowAllProduct" => $Product->ListAllAdmin(),
        "ShowMenu" => $Category->ListAll(),
        "ShowNameUser" => $User->ShowNameUser($user_id)
      ]);
    } catch (Exception $e) {
      echo '<div style="padding: 20px; background-color: #f8d7da; color: #721c24; margin: 10px; border-radius: 5px;">
        <h3>Lỗi hệ thống:</h3>
        <p>' . $e->getMessage() . '</p>
        <p>File: ' . $e->getFile() . ' dòng ' . $e->getLine() . '</p>
      </div>';
    }
  }
  
  // Chi tiết tồn kho theo sản phẩm
  function stockDetail($product_id)
  {
    // Hiển thị tất cả lỗi PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    try {
      $Stock = $this->model("StockModel");
      $User = $this->model("UserModel");
      $Product = $this->model("ProductModel");
      $Category = $this->model("CategoryModel");
      
      if (isset($_SESSION['userlogin'])) {
        $user_id = $_SESSION['userlogin'][3];
      } else {
        $user_id = "";
      }
      
      $productDetail_query = $Product->ListItem($product_id);
      $productDetail = mysqli_fetch_assoc($productDetail_query);
      
      $stockDetails = $Stock->getAllStockByProduct($product_id);
      
      $this->view("masterAdmin", [
        "Page" => "stock_detail",
        "ProductDetail" => $productDetail,
        "StockDetails" => $stockDetails,
        "ShowMenu" => $Category->ListAll(),
        "ShowNameUser" => $User->ShowNameUser($user_id)
      ]);
    } catch (Exception $e) {
      echo '<div style="padding: 20px; background-color: #f8d7da; color: #721c24; margin: 10px; border-radius: 5px;">
        <h3>Lỗi hệ thống:</h3>
        <p>' . $e->getMessage() . '</p>
        <p>File: ' . $e->getFile() . ' dòng ' . $e->getLine() . '</p>
      </div>';
    }
  }
  
  // Thêm mới tồn kho cho tất cả size của sản phẩm
  function stockAddBatch()
  {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
      exit;
    }
    
    try {
      if (isset($_POST['product_id']) && isset($_POST['quantities']) && isset($_POST['sizes'])) {
        $product_id = $_POST['product_id'];
        $quantities = $_POST['quantities'];
        $sizes = $_POST['sizes'];
        
        // Kiểm tra dữ liệu đầu vào
        if (empty($product_id) || !is_array($quantities) || !is_array($sizes) || count($quantities) != count($sizes)) {
          echo '<script>
            alert("Dữ liệu đầu vào không hợp lệ!");
            history.back();
          </script>';
          exit;
        }
        
        $Stock = $this->model("StockModel");
        $success = true;
        $successCount = 0;
        
        // Lặp qua tất cả size và cập nhật/thêm tồn kho
        for ($i = 0; $i < count($sizes); $i++) {
          $size = $sizes[$i];
          $quantity = intval($quantities[$i]);
          
          if ($quantity > 0) {
            $result = $Stock->addStock($product_id, $size, $quantity);
            if ($result) {
              $successCount++;
            } else {
              $success = false;
            }
          }
        }
        
        if ($success && $successCount > 0) {
          echo '<script>
            alert("Cập nhật tồn kho thành công cho ' . $successCount . ' kích thước!");
            window.location.href = "' . BASE_URL . '/Admin/stockDetail/' . $product_id . '";
          </script>';
        } else {
          echo '<script>
            alert("Cập nhật tồn kho thất bại hoặc không có thay đổi nào!");
            history.back();
          </script>';
        }
      } else {
        echo '<script>
          alert("Dữ liệu không hợp lệ!");
          history.back();
        </script>';
      }
    } catch (Exception $e) {
      echo '<script>
        alert("Lỗi hệ thống: ' . $e->getMessage() . '");
        history.back();
      </script>';
    }
  }
  
  function stockEdit($id = "", $size = "")
  {
    // Hiển thị tất cả lỗi PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    try {
      $Stock = $this->model("StockModel");
      $User = $this->model("UserModel");
      $Product = $this->model("ProductModel");
      $Category = $this->model("CategoryModel");
      
      if (isset($_SESSION['userlogin'])) {
        $user_id = $_SESSION['userlogin'][3];
      } else {
        $user_id = "";
      }
      
      if ($id != "" && $size != "") {
        // Cập nhật tồn kho
        $stock_data = $Stock->getStock($id, urldecode($size));
      } else {
        $stock_data = null;
      }
      
      $this->view("masterAdmin", [
        "Page" => "stock_edit",
        "StockData" => $stock_data,
        "ShowAllProduct" => $Product->ListAllAdmin(),
        "ShowAllSizes" => $Product->showPrice($id),
        "ShowMenu" => $Category->ListAll(),
        "ShowNameUser" => $User->ShowNameUser($user_id)
      ]);
    } catch (Exception $e) {
      echo '<div style="padding: 20px; background-color: #f8d7da; color: #721c24; margin: 10px; border-radius: 5px;">
        <h3>Lỗi hệ thống:</h3>
        <p>' . $e->getMessage() . '</p>
        <p>File: ' . $e->getFile() . ' dòng ' . $e->getLine() . '</p>
      </div>';
    }
  }
  
  function stockAdd()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    if (isset($_POST['product_id']) && isset($_POST['size']) && isset($_POST['quantity'])) {
      $product_id = $_POST['product_id'];
      $size = $_POST['size'];
      $quantity = $_POST['quantity'];
      
      $Stock = $this->model("StockModel");
      $result = $Stock->addStock($product_id, $size, $quantity);
      
      if ($result) {
        echo '<script>
          alert("Thêm tồn kho thành công!");
          window.location.href = "' . BASE_URL . '/Admin/stock";
        </script>';
      } else {
        echo '<script>
          alert("Thêm tồn kho thất bại!");
          history.back();
        </script>';
      }
    } else {
      echo '<script>
        alert("Vui lòng nhập đầy đủ thông tin!");
        history.back();
      </script>';
    }
  }
  
  function stockUpdate()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    if (isset($_POST['product_id']) && isset($_POST['size']) && isset($_POST['quantity'])) {
      $product_id = $_POST['product_id'];
      $size = $_POST['size'];
      $quantity = $_POST['quantity'];
      
      $Stock = $this->model("StockModel");
      $result = $Stock->updateStock($product_id, $size, $quantity);
      
      if ($result) {
        echo '<script>
          alert("Cập nhật tồn kho thành công!");
          window.location.href = "' . BASE_URL . '/Admin/stock";
        </script>';
      } else {
        echo '<script>
          alert("Cập nhật tồn kho thất bại!");
          history.back();
        </script>';
      }
    } else {
      echo '<script>
        alert("Vui lòng nhập đầy đủ thông tin!");
        history.back();
      </script>';
    }
  }
  
  function stockDelete($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    $Stock = $this->model("StockModel");
    $result = $Stock->deleteStock($id);
    
    if ($result) {
      echo '<script>
        alert("Xóa tồn kho thành công!");
        window.location.href = "' . BASE_URL . '/Admin/stock";
      </script>';
    } else {
      echo '<script>
        alert("Xóa tồn kho thất bại!");
        history.back();
      </script>';
    }
  }
  
  function stockTransactions()
  {
    // Hiển thị tất cả lỗi PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    
    try {
      $Stock = $this->model("StockModel");
      $User = $this->model("UserModel");
      $Category = $this->model("CategoryModel");
      
      if (isset($_SESSION['userlogin'])) {
        $user_id = $_SESSION['userlogin'][3];
      } else {
        $user_id = "";
      }
      
      $transactions = $Stock->getTransactions(50);
      
      $this->view("masterAdmin", [
        "Page" => "transactions",
        "ShowTransactions" => $transactions,
        "ShowMenu" => $Category->ListAll(),
        "ShowNameUser" => $User->ShowNameUser($user_id)
      ]);
    } catch (Exception $e) {
      echo '<div style="padding: 20px; background-color: #f8d7da; color: #721c24; margin: 10px; border-radius: 5px;">
        <h3>Lỗi hệ thống:</h3>
        <p>' . $e->getMessage() . '</p>
        <p>File: ' . $e->getFile() . ' dòng ' . $e->getLine() . '</p>
      </div>';
    }
  }
  
  // Lấy danh sách kích cỡ theo sản phẩm (AJAX)
  function getSizes()
  {
    header('Content-Type: application/json');
    
    if (isset($_POST['product_id'])) {
      $product_id = $_POST['product_id'];
      
      $Product = $this->model("ProductModel");
      $sizes = $Product->showPrice($product_id);
      
      if ($sizes) {
        echo json_encode([
          'status' => 'success',
          'sizes' => $sizes
        ]);
      } else {
        echo json_encode([
          'status' => 'error',
          'message' => 'Không tìm thấy kích cỡ sản phẩm'
        ]);
      }
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Thiếu thông tin sản phẩm'
      ]);
    }
  }
  
  // Kiểm tra số lượng tồn kho (AJAX)
  function checkStock()
  {
    header('Content-Type: application/json');
    
    if (isset($_POST['product_id']) && isset($_POST['size'])) {
      $product_id = $_POST['product_id'];
      $size = $_POST['size'];
      $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
      
      $Stock = $this->model("StockModel");
      $stockCheck = $Stock->checkStockAvailable($product_id, $size, $quantity);
      
      if ($stockCheck['status']) {
        echo json_encode([
          'status' => 'success',
          'quantity' => $stockCheck['available'],
          'message' => $stockCheck['message']
        ]);
      } else {
        echo json_encode([
          'status' => 'warning',
          'quantity' => $stockCheck['available'],
          'message' => $stockCheck['message']
        ]);
      }
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Thiếu thông tin sản phẩm',
        'quantity' => 0
      ]);
    }
  }
}
