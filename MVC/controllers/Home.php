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
    // if (sizeof($_SESSION['giohang']) == 0) {
    if (!isset($_SESSION['giohang'])) {
      echo '
            <script>
                alert("Chưa có sản phẩm trong giỏ hàng")
                window.location.assign("../");
            </script>
        ';
    } else {
      if (isset($_SESSION['giohang'])) {
        $numCart = 0;
        for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
          $numCart += $_SESSION['giohang'][$i][2];
        }
        if ($numCart == 0) {
          echo '
            <script>
                alert("Chưa có sản phẩm trong giỏ hàng")
                window.location.assign("../");
            </script>
        ';
        }
      }
    }

    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      echo '
            <script>
                alert("Vui lòng đăng nhập để tiến hành đặt hàng")
                window.location.assign("../home/login");
            </script>
        ';
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

      // Tiến hành đặt hàng
      $Cart = $this->model("UserModel");
      $Order = $Cart->Order($id);

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

        echo '<script>
                try {
                    localStorage.removeItem("backup_cart");
                    console.log("Đã xóa backup giỏ hàng");
                } catch(e) {
                    console.log("Không thể xóa backup giỏ hàng:", e);
                }
                alert("Đã đặt hàng thành công! Cảm ơn bạn đã mua sắm tại MetaCoffee.");
                window.location.href = "' . BASE_URL . '/home/history";
            </script>';
      } else {
        // Khôi phục giỏ hàng nếu đặt hàng thất bại
        $_SESSION['giohang'] = $backup_cart;

        echo '<script>
                alert("Đặt hàng thất bại! Vui lòng thử lại sau.");
                window.location.href = "' . BASE_URL . '/home/checkout";
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
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    if (isset($_SESSION['userlogin'])) {
      $id = $_SESSION['userlogin'][3];
    } else {
      $id = "1";
    }
    $ProductModel = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "history",
      "showHistoty" => $ProductModel->showHistoty($id),
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }
  function historyDetails($id)
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }

    $User = $this->model("UserModel");
    $ProductModel = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    $this->view("master2", [
      "Page" => "historyDetails",
      "showHistoryDetails" => $ProductModel->showHistoryDetails($id),
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
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

      // Kiểm tra tồn kho trước khi thêm vào giỏ hàng
      $Stock = $this->model("StockModel");
      $stockCheck = $Stock->checkStockAvailable($id, $size, $num);

      // Nếu không đủ hàng
      if (!$stockCheck['status']) {
        echo '<script>
          alert("' . $stockCheck['message'] . ' cho sản phẩm ' . $name . ' kích cỡ ' . $size . '");
          window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
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

      // Kiểm tra xem tổng số lượng có vượt quá tồn kho không
      if ($total_quantity > $stockCheck['available']) {
        echo '<script>
          alert("Số lượng sản phẩm ' . $name . ' kích cỡ ' . $size . ' trong kho chỉ còn ' . $stockCheck['available'] . ' sản phẩm. Bạn đã có ' . ($total_quantity - $num) . ' sản phẩm trong giỏ hàng.");
          window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
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
      echo '<script>
        try {
          localStorage.setItem("backup_cart", JSON.stringify(' . json_encode($_SESSION['giohang']) . '));
          console.log("Đã lưu giỏ hàng vào localStorage");
        } catch(e) {
          console.log("Không thể lưu giỏ hàng vào localStorage:", e);
        }
        alert("Đã thêm sản phẩm vào giỏ hàng");
        window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";
      </script>';
    }
  }
}
