<?php
class Cart extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    if (isset($_SESSION['giohang'])) {
      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $num = $_SESSION['giohang'][$i][2];
        $size = $_SESSION['giohang'][$i][0];
        $id = $_SESSION['giohang'][$i][1];
      }
    }
    $this->view("master2", [
      "Page" => "cart",
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function deldCart($id)
  {
    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_SESSION['giohang']) && isset($_SESSION['giohang'][$id])) {
      array_splice($_SESSION['giohang'], $id, 1);
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }

  public function checkoutAction()
  {
    header('Content-Type: application/json');
    
    try {
        // Đảm bảo session đã bắt đầu
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Trả về thành công trực tiếp, không kiểm tra tồn kho ở đây
        // Việc kiểm tra tồn kho sẽ được thực hiện ở Home::checkoutAct
        echo json_encode([
            'status' => 'success',
            'message' => 'OK'
        ]);
        exit;
    } catch (Exception $e) {
        // Xử lý ngoại lệ nếu có
        echo json_encode([
            'status' => 'error',
            'message' => 'Đã xảy ra lỗi trong quá trình kiểm tra: ' . $e->getMessage()
        ]);
        exit;
    }
  }

  // Phương thức để khôi phục giỏ hàng từ localStorage
  public function restoreCart()
  {
    header('Content-Type: application/json');
    
    try {
        // Đảm bảo session đã bắt đầu
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Lấy dữ liệu giỏ hàng từ request
        if (isset($_POST['backup_cart'])) {
            $backup_cart = json_decode($_POST['backup_cart'], true);
            
            // Kiểm tra tính hợp lệ của dữ liệu
            if (is_array($backup_cart) && count($backup_cart) > 0) {
                // Khôi phục giỏ hàng
                $_SESSION['giohang'] = $backup_cart;
                
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Đã khôi phục giỏ hàng thành công',
                    'count' => count($backup_cart)
                ]);
                exit;
            }
        }
        
        echo json_encode([
            'status' => 'error',
            'message' => 'Không thể khôi phục giỏ hàng'
        ]);
        exit;
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
        ]);
        exit;
    }
  }
}
