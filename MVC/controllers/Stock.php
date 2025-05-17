<?php
class Stock extends Controller
{
    public function __construct()
    {
        // // Chỉ kiểm tra quyền admin cho các action quản lý, không kiểm tra cho checkStock và getSizes
        // $current_action = isset($_GET['url']) ? explode('/', $_GET['url']) : ['Stock'];
        
        // // Nếu action hiện tại không phải là checkStock hoặc getSizes, yêu cầu quyền admin
        // if (!isset($current_action[1]) || ($current_action[1] != 'checkStock' && $current_action[1] != 'getSizes')) {
        //     // Kiểm tra xem người dùng đã đăng nhập và có quyền admin không
        //     if (!isset($_SESSION['userlogin']) || $_SESSION['userlogin'][2] != 2) {
        //         echo '<script>
        //             alert("Bạn không có quyền truy cập vào trang quản lý tồn kho!");
        //             window.location.href = "' . BASE_URL . '/home";
        //         </script>';
        //         exit;
        //     }
        // }
    }

    // Hiển thị trang quản lý tồn kho
    public function Default()
    {
        if (isset($_SESSION['userlogin'])) {
            $user_id = $_SESSION['userlogin'][3];
        } else {
            $user_id = "";
        }

        $User = $this->model("UserModel");
        $Stock = $this->model("StockModel");
        $Product = $this->model("ProductModel");
        $Category = $this->model("CategoryModel");

        $this->view("masterAdmin", [
            "Page" => "stock_management",
            "ShowAllStock" => $Stock->getAllStock(),
            "ShowAllProduct" => $Product->ListAllAdmin(),
            "ShowMenu" => $Category->ListAll(),
            "ShowNameUser" => $User->ShowNameUser($user_id)
        ]);
    }

    // Hiển thị trang thêm/cập nhật tồn kho
    public function edit($id = "", $size = "")
    {
        if (isset($_SESSION['userlogin'])) {
            $user_id = $_SESSION['userlogin'][3];
        } else {
            $user_id = "";
        }

        $User = $this->model("UserModel");
        $Stock = $this->model("StockModel");
        $Product = $this->model("ProductModel");
        $Category = $this->model("CategoryModel");

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
    }

    // Thêm mới tồn kho
    public function add()
    {
        if (isset($_POST['product_id']) && isset($_POST['size']) && isset($_POST['quantity'])) {
            $product_id = $_POST['product_id'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];

            $Stock = $this->model("StockModel");
            $result = $Stock->addStock($product_id, $size, $quantity);

            if ($result) {
                echo '<script>
                    alert("Thêm tồn kho thành công!");
                    window.location.href = "./Stock";
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

    // Cập nhật tồn kho
    public function update()
    {
        if (isset($_POST['product_id']) && isset($_POST['size']) && isset($_POST['quantity'])) {
            $product_id = $_POST['product_id'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];

            $Stock = $this->model("StockModel");
            $result = $Stock->updateStock($product_id, $size, $quantity);

            if ($result) {
                echo '<script>
                    alert("Cập nhật tồn kho thành công!");
                    window.location.href = "./Stock";
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

    // Xóa tồn kho
    public function delete($id)
    {
        $Stock = $this->model("StockModel");
        $result = $Stock->deleteStock($id);

        if ($result) {
            echo '<script>
                alert("Xóa tồn kho thành công!");
                window.location.href = "./Stock";
            </script>';
        } else {
            echo '<script>
                alert("Xóa tồn kho thất bại!");
                history.back();
            </script>';
        }
    }

    // Hiển thị lịch sử giao dịch
    public function transactions()
    {
        if (isset($_SESSION['userlogin'])) {
            $user_id = $_SESSION['userlogin'][3];
        } else {
            $user_id = "";
        }

        $User = $this->model("UserModel");
        $Stock = $this->model("StockModel");
        $Category = $this->model("CategoryModel");

        $this->view("masterAdmin", [
            "Page" => "transactions",
            "ShowTransactions" => $Stock->getTransactions(50),
            "ShowMenu" => $Category->ListAll(),
            "ShowNameUser" => $User->ShowNameUser($user_id)
        ]);
    }

    // Kiểm tra số lượng tồn kho (AJAX)
    public function checkStock()
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

    // Lấy danh sách kích cỡ theo sản phẩm (AJAX)
    public function getSizes()
    {
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
} 