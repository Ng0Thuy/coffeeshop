<?php
class Home extends Controller
{
  public function __construct() {}

  function Default()
  {
    // session_destroy();
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }
    $User = $this->model("UserModel");
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master1", [
      "Page" => "home",
      "showProduct" => $Product->ListAllAdmin1(),
      "showProductSelling" => $Product->showProductSelling(),
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function logout()
  {
    unset($_SESSION['userlogin']);
    echo '
      <script>
      history.back();
      </script>
    ';
  }

  function phantrang()
  {
    if (isset($_POST['category'])) {
      $category_id_o = implode("','", $_POST['category']);
    }
    $ProductModel = $this->model("ProductModel");
    $phantrang = $ProductModel->phantrang();
  }

  function showNumAjax()
  {
    $ProductModel = $this->model("ProductModel");
    $showNumAjax = $ProductModel->showNumAjax();
  }

  function product($id)
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }
    $_SESSION['idSP'] = $id;
    $User = $this->model("UserModel");
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "product",
      "showProductItem" => $Product->ListItemProduct($id),
      "showPrice" => $Product->showPrice($id),
      "showComment" => $Product->showComment($id),
      "showSize" => $Product->showPrice($id),
      "showSize2" => $Product->showPrice($id),
      "ShowMenu" => $Category->ListAll(),
      "ProductRelated" => $Product->ProductRelated($id),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function forgotAction()
  {
    $user = $this->model("UserModel");
    $kq = $user->forgot();
  }

  function login()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $Models = $this->model("HomeModel");
    $Category = $this->model("CategoryModel");
    $this->view("master3", [
      "Page" => "login1",
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }



  function regsiter()
  {
    $Category = $this->model("CategoryModel");
    $this->view("master3", [
      "Page" => "regsiter1",
      "ShowMenu" => $Category->ListAll(),
    ]);
  }

  function loginAction()
  {
    $Login = $this->model("UserModel");
    $kq = $Login->Login();
  }

  function thucdon()
  {

    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "list_Product",
      "showMenu" => $CategoryModel->ListAll(),
      "showAll" => $ProductModel->ListAll(),
      "showNum" => $ProductModel->showNum(),
      "ListAllAdmin" => $ProductModel->ListAllAdmin(),
      "ShowMenu" => $CategoryModel->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }


  function gioithieu()
  {
    $this->view("master3", [
      "Page" => "gioithieu",
    ]);
  }

  function lienhe()
  {
    $this->view("master3", [
      "Page" => "lienhe",
    ]);
  }



  function danhmuc($id)
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }
    $User = $this->model("UserModel");
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    $this->view("master2", [
      "Page" => "danhmuc",
      "showMenu" => $CategoryModel->ListAll(),
      "ListItemId" => $ProductModel->ListItemId($id),
      "showNum" => $ProductModel->showNumId($id),
      "ListAllCt" => $ProductModel->ListAllCt($id),
      "ShowMenu" => $CategoryModel->ListAll(),
      "ShowName" => $CategoryModel->ListItem($id),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function search()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $CategoryModel = $this->model("CategoryModel");
    $ProductModel = $this->model("ProductModel");
    if (isset($_POST['search'])) {
      $id = $_POST['search'];
    }
    $this->view("master2", [
      "Page" => "danhmuc",
      "showMenu" => $CategoryModel->ListAll(),
      "ShowMenu" => $CategoryModel->ListAll(),
      "ListSearch" => $ProductModel->ListSearch($id),
      "ListNumSearch" => $ProductModel->ListNumSearch($id),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function checkout()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    if (!isset($_SESSION['giohang'])) {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
            title: "Thông báo",
            text: "Chưa có sản phẩm trong giỏ hàng",
            icon: "warning",
            confirmButtonText: "Đồng ý"
          }).then((result) => {
            window.location.href = "' . BASE_URL . '/";
          });
        });
      </script>';
      return;
    } else {
      if (isset($_SESSION['giohang'])) {
        $numCart = 0;
        for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
          $numCart += $_SESSION['giohang'][$i][2];
        }
        if ($numCart == 0) {
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              Swal.fire({
                title: "Thông báo",
                text: "Chưa có sản phẩm trong giỏ hàng",
                icon: "warning",
                confirmButtonText: "Đồng ý"
              }).then((result) => {
                window.location.href = "' . BASE_URL . '/";
              });
            });
          </script>';
          return;
        }
        
        // Lấy số lượng tối đa từ cài đặt hệ thống
        $max_quantity = $this->getSystemSetting('max_cart_quantity', 10);
        
        // Kiểm tra tổng số lượng sản phẩm trong giỏ hàng
        if ($numCart > $max_quantity) {
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              Swal.fire({
                title: "Thông báo",
                text: "Một đơn hàng chỉ được phép có tối đa ' . $max_quantity . ' sản phẩm. Vui lòng giảm số lượng sản phẩm trong giỏ hàng.",
                icon: "warning",
                confirmButtonText: "Đồng ý"
              }).then((result) => {
                window.location.href = "' . BASE_URL . '/Cart";
              });
            });
          </script>';
          return;
        }
      }
    }

    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
            title: "Thông báo",
            text: "Vui lòng đăng nhập để tiến hành đặt hàng",
            icon: "warning",
            confirmButtonText: "Đồng ý"
          }).then((result) => {
            window.location.href = "' . BASE_URL . '/home/login";
          });
        });
      </script>';
      return;
    }
    $User = $this->model("UserModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "checkout",
      "showUserCheckout" => $User->showUserCheckout($user_id),
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function checkoutAct()
  {
    if (isset($_POST['checkout'])) {
      // Đảm bảo session đã được bắt đầu
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

      if (isset($_SESSION['userlogin'])) {
        $id = $_SESSION['userlogin'][3];
      } else {
        $id = "";
        echo '<script>
                alert("Vui lòng đăng nhập để tiến hành đặt hàng");
                window.location.href = "' . BASE_URL . '/home/login";
            </script>';
        return;
      }

      // Kiểm tra giỏ hàng trước khi tiếp tục xử lý
      if (!isset($_SESSION['giohang']) || !is_array($_SESSION['giohang']) || empty($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
        // Kiểm tra xem có backup giỏ hàng trong localStorage không (thông qua JavaScript)
        echo '<script>
                var backup_cart = localStorage.getItem("backup_cart");
                if (backup_cart) {
                    alert("Đang khôi phục giỏ hàng của bạn từ backup...");
                    // Gửi yêu cầu AJAX để khôi phục giỏ hàng
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "' . BASE_URL . '/cart/restoreCart", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                // Tải lại trang
                                window.location.reload();
                            } else {
                                alert("Không có sản phẩm trong giỏ hàng");
                                window.location.href = "' . BASE_URL . '/home";
                            }
                        }
                    };
                    xhr.send("backup_cart=" + backup_cart);
                } else {
                    alert("Không có sản phẩm trong giỏ hàng");
                    window.location.href = "' . BASE_URL . '/home";
                }
            </script>';
        return;
      }

      // Lưu backup giỏ hàng (đề phòng lỗi)
      $backup_cart = $_SESSION['giohang'];

      // Tiến hành đặt hàng - Trạng thái mặc định là "Đang tiếp nhận"
      $Cart = $this->model("UserModel");
      $Order = $Cart->Order($id, "Đang tiếp nhận");

      if ($Order) {
        // Nếu đặt hàng thành công, cập nhật tồn kho
        $Stock = $this->model("StockModel");

        // Lấy thông tin chi tiết đơn hàng vừa tạo để cập nhật tồn kho
        $order_id = $Order; // Giả sử Order trả về order_id vừa tạo
        $OrderDetails = $Cart->getOrderDetails($order_id);

        if ($OrderDetails) {
          foreach ($OrderDetails as $item) {
            // Lấy thông tin sản phẩm từ variant_id
            $variantInfo = $Cart->getVariantInfo($item['variant_id']);

            if ($variantInfo) {
              $product_id = $variantInfo['product_id'];
              $size = $variantInfo['size'];
              $quantity = $item['num'];

              // Giảm số lượng tồn kho
              $Stock->decreaseStock($product_id, $size, $quantity);
            }
          }
        }

        // Lưu thông tin đơn hàng thành công trước khi xóa giỏ hàng
        $_SESSION['order_success'] = true;
        $_SESSION['order_id'] = $order_id;

        // Xóa giỏ hàng sau khi đặt hàng thành công
        $_SESSION['giohang'] = [];
        if (isset($_SESSION['total'])) {
          $_SESSION['total'] = 0;
        }

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            try {
              localStorage.removeItem("backup_cart");
              console.log("Đã xóa backup giỏ hàng");
            } catch(e) {
              console.log("Không thể xóa backup giỏ hàng:", e);
            }
            
            Swal.fire({
              title: "Thành công!",
              text: "Đã đặt hàng thành công! Cảm ơn bạn đã mua sắm tại MetaCoffee.",
              icon: "success",
              confirmButtonText: "Xem đơn hàng",
              timer: 3000,
              timerProgressBar: true
            }).then(function() {
              window.location.href = "' . BASE_URL . '/home/history";
            });
          });
        </script>';
      } else {
        // Khôi phục giỏ hàng nếu đặt hàng thất bại
        $_SESSION['giohang'] = $backup_cart;

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Lỗi!",
              text: "Đặt hàng thất bại! Vui lòng thử lại sau.",
              icon: "error",
              confirmButtonText: "Thử lại"
            }).then(function() {
              window.location.href = "' . BASE_URL . '/home/checkout";
            });
          });
        </script>';
      }
    } else {
      // Nếu không có tham số checkout, chuyển hướng về trang chủ
      echo '<script>
            window.location.href = "' . BASE_URL . '/home";
        </script>';
    }
  }

  function history()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
      
      $User = $this->model("UserModel");
      $ProductModel = $this->model("ProductModel");
      $Category = $this->model("CategoryModel");
      $this->view("master2", [
        "Page" => "history",
        "showHistoty" => $ProductModel->showHistoty($user_id),
        "ShowMenu" => $Category->ListAll(),
        "ShowNameUser" => $User->ShowNameUser($user_id),
      ]);
    } else {
      // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
      echo '<script>
          alert("Vui lòng đăng nhập để xem lịch sử đơn hàng");
          window.location.href = "' . BASE_URL . '/home/login";
      </script>';
    }
  }
  function historyDetails($id)
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
      
      // Kiểm tra xem đơn hàng có thuộc về người dùng hiện tại không
      $ProductModel = $this->model("ProductModel");
      $User = $this->model("UserModel");
      $Category = $this->model("CategoryModel");
      
      // Kiểm tra quyền truy cập đơn hàng
      $checkOrder = $ProductModel->checkOrderOwnership($id, $user_id);
      
      if ($checkOrder) {
        $this->view("master2", [
          "Page" => "historyDetails",
          "showHistoryDetails" => $ProductModel->showHistoryDetails($id),
          "ShowMenu" => $Category->ListAll(),
          "ShowNameUser" => $User->ShowNameUser($user_id),
        ]);
      } else {
        echo '<script>
          alert("Bạn không có quyền xem chi tiết đơn hàng này");
          window.location.href = "' . BASE_URL . '/home/history";
        </script>';
      }
    } else {
      // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
      echo '<script>
          alert("Vui lòng đăng nhập để xem chi tiết đơn hàng");
          window.location.href = "' . BASE_URL . '/home/login";
      </script>';
    }
  }

  function user()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $id = $_SESSION['userlogin'][3];
    $UserModel = $this->model("UserModel");
    $Category = $this->model("CategoryModel");
    $this->view("master3", [
      "Page" => "user",
      "ShowMenu" => $Category->ListAll(),
      "ShowAbout" => $UserModel->ListItem($id),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }

  function RegisterAction()
  {
    $register = $this->model("UserModel");
    $kq = $register->register();
  }
  function commentAction()
  {
    $comment = $this->model("UserModel");
    $kq = $comment->comment();
  }

  // function changepass()
  // {
  //   $UserModel = $this->model("UserModel");
  //   $password = $_POST['password'];
  //   $user_id = $_POST['user_id'];
  //   $passwordnew = $_POST['passwordnew'];
  //   $checkPass = $UserModel->checkPass($password, $passwordnew, $user_id);
  // }

  function changepass()
  {
    $UserModel = $this->model("UserModel");
    $password = $_POST['password'];
    $user_id = $_POST['user_id'];
    $passwordnew = $_POST['passwordnew'];
    $checkPass = $UserModel->checkPass($password, $passwordnew, $user_id);
  }

  function edituser()
  {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $user_id = $_POST['user_id'];

    $UserModel = $this->model("UserModel");
    $checkPass = $UserModel->editUser($user_id, $name, $address, $phone);
  }

  function deleteComment()
  {
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
    } else {
      $id = 0;
    }
    $ProductModel = $this->model("ProductModel");
    $deleteComment = $ProductModel->deleteComment($id);
  }
  function loadComment()
  {
    $ProductModel = $this->model("ProductModel");
    $id = $_SESSION['idSP'];
    $result = $ProductModel->showComment($id);

    while ($binhluan = mysqli_fetch_assoc($result)) {
?>
      <div class="comment-list" id="load_data">
        <div class="comment">
          <div class="comment-avatar">
            <img src="<?= BASE_URL ?>/MVC/public/images/users/SEIJ6567.JPG" alt="">
          </div>
          <div class="comment-user">
            <div class="comment-user__name"><?= $binhluan['name'] ?></div>
            <div class="comment-user__content"><?= $binhluan['comment_content'] ?></div>
            <div class="comment-user__content time"><?= $binhluan['comment_date'] ?></div>
            <?php
            if (isset($_SESSION['userlogin'])) {
              if ($binhluan['user_id'] == $_SESSION['userlogin'][3]) {
            ?>
                <p id="deletecomment" onclick="deleteComment(<?= $binhluan['comment_id'] ?>)" class="deletecomment">Xóa</p>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
<?php
    }
  }

  // Thêm phương thức để lấy giá trị cài đặt
  private function getSystemSetting($key, $default = null)
  {
    $Setting = $this->model("SettingModel");
    
    // Kiểm tra bảng cài đặt đã tồn tại chưa
    try {
      $setting = $Setting->getSetting($key);
      
      if ($setting) {
        return $setting['setting_value'];
      }
    } catch (Exception $e) {
      // Nếu có lỗi, sử dụng giá trị mặc định
    }
    
    return $default;
  }

  function AddToCart()
  {
    if (!isset($_SESSION['giohang'])) {
      $_SESSION['giohang'] = [];
    }

    if (isset($_POST["addToCart"])) {
      $num = intval($_POST['num']);
      $size = $_POST['size'];
      $id = $_POST['id'];
      $thumbnail = $_POST['thumbnail'];
      $price = $_POST['price'];
      $name = $_POST['name'];

      // Đảm bảo số lượng hợp lệ
      if ($num <= 0) {
        $num = 1;
      }

      // Lấy số lượng tối đa từ cài đặt hệ thống (mặc định là 10)
      $max_quantity = $this->getSystemSetting('max_cart_quantity', 10);

      // Kiểm tra tồn kho trước khi thêm vào giỏ hàng
      $Stock = $this->model("StockModel");
      $stockCheck = $Stock->checkStockAvailable($id, $size, $num);

      // Nếu không đủ hàng
      if (!$stockCheck['status']) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Thông báo",
              text: "' . $stockCheck['message'] . ' cho sản phẩm ' . $name . ' kích cỡ ' . $size . '",
              icon: "error",
              confirmButtonText: "Đồng ý"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
              }
            });
          });
        </script>';
        return;
      }

      // Kiểm tra trong giỏ hàng đã có sản phẩm này chưa
      $check = 0;
      $total_quantity = $num; // Số lượng mới thêm vào

      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $id && $_SESSION['giohang'][$i][0] == $size) {
          $check = 1;
          $total_quantity += $_SESSION['giohang'][$i][2]; // Cộng với số lượng đã có trong giỏ hàng
          break;
        }
      }

      // Kiểm tra xem tổng số lượng có vượt quá giới hạn không
      if ($total_quantity > $max_quantity) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Thông báo",
              text: "Số lượng tối đa cho mỗi sản phẩm là ' . $max_quantity . '. Bạn đã có ' . ($total_quantity - $num) . ' sản phẩm trong giỏ hàng.",
              icon: "warning",
              confirmButtonText: "Đồng ý"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
              }
            });
          });
        </script>';
        return;
      }

      // Kiểm tra xem tổng số lượng có vượt quá tồn kho không
      if ($total_quantity > $stockCheck['available']) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Thông báo",
              text: "Số lượng sản phẩm ' . $name . ' kích cỡ ' . $size . ' trong kho chỉ còn ' . $stockCheck['available'] . ' sản phẩm. Bạn đã có ' . ($total_quantity - $num) . ' sản phẩm trong giỏ hàng.",
              icon: "warning",
              confirmButtonText: "Đồng ý"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
              }
            });
          });
        </script>';
        return;
      }

      // Xử lý thêm vào giỏ hàng
      if ($check != 0) {
        // Nếu đã có thì cập nhật số lượng
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
          if ($_SESSION['giohang'][$i][1] == $id && $_SESSION['giohang'][$i][0] == $size) {
            $_SESSION['giohang'][$i][2] = $_SESSION['giohang'][$i][2] + $num;
            break;
          }
        }
      } else {
        // Nếu chưa có thì thêm mới
        $sp = [$size, $id, $num, $price, $thumbnail, $name];
        $_SESSION['giohang'][] = $sp;
      }

      // Lưu backup giỏ hàng vào localStorage (thông qua JavaScript)
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          try {
            localStorage.setItem("backup_cart", JSON.stringify(' . json_encode($_SESSION['giohang']) . '));
            console.log("Đã lưu giỏ hàng vào localStorage");
          } catch(e) {
            console.log("Không thể lưu giỏ hàng vào localStorage:", e);
          }
          
          Swal.fire({
            title: "Thành công",
            text: "Đã thêm sản phẩm vào giỏ hàng",
            icon: "success",
            confirmButtonText: "Đồng ý",
            timer: 2000
          }).then((result) => {
            window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
          });
        });
      </script>';
    }
  }

  function cancelOrder($order_id)
  {
    if (!isset($_SESSION['userlogin'])) {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
            title: "Thông báo",
            text: "Vui lòng đăng nhập để thực hiện chức năng này",
            icon: "warning",
            confirmButtonText: "Đăng nhập ngay"
          }).then((result) => {
            window.location.href = "' . BASE_URL . '/home/login";
          });
        });
      </script>';
      return;
    }

    $user_id = $_SESSION['userlogin'][3];
    $ProductModel = $this->model("ProductModel");
    
    // Kiểm tra quyền hủy đơn hàng
    $canCancel = $ProductModel->canCancelOrder($order_id, $user_id);
    
    if ($canCancel) {
      // Cập nhật trạng thái đơn hàng thành "Đã hủy"
      $result = $ProductModel->updateOrderStatus($order_id, "Đã hủy");
      
      if ($result) {
        // Hoàn lại tồn kho sản phẩm
        $this->restoreStock($order_id);
        
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Thành công",
              text: "Đơn hàng đã được hủy thành công",
              icon: "success",
              confirmButtonText: "Đồng ý",
              timer: 2000,
              timerProgressBar: true
            }).then((result) => {
              window.location.href = "' . BASE_URL . '/home/history";
            });
          });
        </script>';
      } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              title: "Lỗi",
              text: "Có lỗi xảy ra khi hủy đơn hàng, vui lòng thử lại sau",
              icon: "error",
              confirmButtonText: "Đồng ý"
            }).then((result) => {
              window.location.href = "' . BASE_URL . '/home/history";
            });
          });
        </script>';
      }
    } else {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
            title: "Không thể hủy",
            text: "Bạn không thể hủy đơn hàng này. Chỉ đơn hàng ở trạng thái \'Đang tiếp nhận\' mới có thể hủy.",
            icon: "warning",
            confirmButtonText: "Đồng ý"
          }).then((result) => {
            window.location.href = "' . BASE_URL . '/home/history";
          });
        });
      </script>';
    }
  }
  
  private function restoreStock($order_id)
  {
    // Lấy thông tin chi tiết đơn hàng
    $User = $this->model("UserModel");
    $Stock = $this->model("StockModel");
    $OrderDetails = $User->getOrderDetails($order_id);
    
    if ($OrderDetails) {
      foreach ($OrderDetails as $item) {
        // Lấy thông tin sản phẩm từ variant_id
        $variantInfo = $User->getVariantInfo($item['variant_id']);
        
        if ($variantInfo) {
          $product_id = $variantInfo['product_id'];
          $size = $variantInfo['size'];
          $quantity = $item['num'];
          
          // Tăng số lượng tồn kho
          $Stock->increaseStock($product_id, $size, $quantity);
        }
      }
    }
  }
}
