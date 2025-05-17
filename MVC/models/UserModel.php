<?php
class UserModel extends DB
{
    public function ShowNameUser($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        return mysqli_query($this->con, $sql);
    }

    public function ListAll()
    {
        $sql = "SELECT * FROM user";
        return mysqli_query($this->con, $sql);
    }
    public function countUser()
    {
        $sql = "SELECT count(*) FROM user";
        return mysqli_query($this->con, $sql);
    }
    public function ListUserRole()
    {
        $sql = "SELECT * FROM user 
        INNER JOIN role WHERE role.role_id = user.role_id ORDER BY user_id DESC";
        return mysqli_query($this->con, $sql);
    }
    // public function checkPass($password,$passwordnew, $user_id){
    //     $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password ='$password'";
    //     $check = mysqli_query($this->con, $sql);
    //     if(mysqli_num_rows($check)>0){
    //         $sql = "UPDATE user set password ='$passwordnew' where user_id ='$user_id'";
    //         $result = mysqli_query($this->con, $sql);
    //         echo '
    //         <script>
    //             alert("sửa thông tin người dùng thành công");
    //             window.location.assign("./user");
    //         </script>
    //         ';
    //     }
    // }


    public function checkPass($password, $passwordnew, $user_id)
    {
        if (isset($password) && isset($passwordnew) && isset($user_id)) {
            $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password ='$password'";
            $check = mysqli_query($this->con, $sql);
            if (mysqli_num_rows($check) > 0) {
                $sql = "UPDATE user set password ='$passwordnew' where user_id ='$user_id'";
                $result = mysqli_query($this->con, $sql);
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Đổi mật khẩu thành công'
                ));
            } else {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Mật khẩu không trùng'
                ));
                exit;
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Đã xảy ra lỗi'
            ));
            exit;
        }
    }


    public function edit_user($name, $address, $phone, $user_id)
    {
        if (isset($name) && isset($address) && isset($phone)) {
            $sql = "UPDATE user set `name` ='$name', `address` ='$address', `phone` ='$phone' where `user_id` ='$user_id'";
            $result = mysqli_query($this->con, $sql);
            if (!$result) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Thay đổi thông tin không thành công.'
                ));
            } else {
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Thay đổi thông tin thành công.'
                ));
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thay đổi không tin không thành công.'
            ));
            exit;
        }
    }


    public function ListItem($id)
    {
        $sql = "SELECT * FROM user WHERE user_id =$id";
        return mysqli_query($this->con, $sql);
    }

    public function showRole()
    {
        $sql = "SELECT * FROM role";
        return mysqli_query($this->con, $sql);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE user_id =$id";
        return mysqli_query($this->con, $sql);
    }

    public function edit()
    {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $user_id = $_POST['user_id'];
            $role_id = $_POST['role_id'];

            $sql = "UPDATE user SET name='$name', email = '$email', phone = '$phone',address='$address', role_id = '$role_id'  WHERE user_id = '$user_id' ";
            $result = mysqli_query($this->con, $sql);
            echo '
            <script>
                alert("sửa thông tin người dùng thành công");
                window.location.assign("./user");
            </script>
            ';
            die;
        }
    }

    public function register()
    {
        $error = false;
        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $hoten = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verify = (rand(10000, 99999));
            $check = mysqli_query($this->con, "SELECT * FROM user where email = '$email'");
            if (mysqli_num_rows($check) > 0) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Email đã tồn tại'
                ));
                exit;
            } else {
                $result = mysqli_query($this->con, "INSERT INTO user (role_id,name,email, phone, password, verify)
                VALUES ('1','" . $hoten . "','" . $email . "','" . $phone . "','" . $password . "','" . $verify . "' )");
                if (!$result) {
                    if (strpos(mysqli_error($this->con), "Duplicate entry") !== FALSE) {
                        echo json_encode(array(
                            'status' => 0,
                            'message' => 'Tên đăng nhập đã tồn tại'
                        ));
                        exit;
                    }
                }
                mysqli_close($this->con);
                if ($error !== false) {
                    echo json_encode(array(
                        'status' => 0,
                        'message' => 'Có lỗi khi đăng ký, xin mời thử lại'
                    ));
                    exit;
                } else {
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Đăng ký thành công'
                    ));
                    exit;
                }
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Bạn chưa nhập thông tin'
            ));
            exit;
        }
    }

    // Quên mk
    function forgot()
    {
        require("./mvc/public/PHPMailer-master/src/PHPMailer.php");
        require "./mvc/public/PHPMailer-master/src/SMTP.php";
        require "./mvc/public/PHPMailer-master/src/Exception.php";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email']; // Email cần gửi đến
            $subject = "Khôi phục mật khẩu";
            $message = "Xin chào";
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: cho phép các trường hợp ngoại lệ

            $sql = "SELECT * FROM user WHERE email='$email'";
            $url = BASE_URL;
            $kq = mysqli_query($this->con, $sql);
            $numrows_email = mysqli_num_rows($kq);
            if ($numrows_email == 1) {
                foreach ($kq as $item) {
                    $message = 'Xin chào ' . '<strong>' . $item['name'] . '</strong>' . '
                    <br>Mật khẩu của bạn là: ' . '<strong>' . $item['password'] . '</strong>' . '<br>Hãy đăng nhập để tiến hành sử dụng nhé: ' . $url . '/Home/login';
                }
            } else {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Email không tồn tại!'
                ));
                exit;
            }

            // TRY có thể nó sẽ xảy ra ngoại lệ
            try {
                //Server settings
                $mail->isSMTP(); // gửi mail SMTP
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  // khai báo SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $nguoigui = 'hellook332@gmail.com'; // Tài khoản Email
                $matkhau = 'thanh1010'; // Mật khẩu Email
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // Port kết nối: khai báo 465 hoặc 587                


                // Recipients - Người nhận
                $tennguoigui = 'Coffee Shop | Dự án 1'; // Tên người gửi lấy từ form nhập
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->setFrom($nguoigui, $tennguoigui); //mail và tên người nhận 
                $to = $email; // Email cần gửi đến lấy từ form nhập
                $to_name = "Nguyễn Đăng Thành"; // Tên người cần gửi đến

                // Content 
                $mail->addAddress($to, $to_name); //mail và tên người nhận  
                $mail->isHTML(true);  // Khai báo nội dung email hiển thị định dạng html
                $mail->Subject = 'Khôi phục mật khẩu'; // Tiêu đề email
                $mail->Body = $message; // Nội dung email

                $mail->send(); // Tiến hành gửi thư
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Mật khẩu của bạn đã được gứi tới email!'
                ));
                exit;
            }
            // nếu ở trên lỗi thì CATCH sẽ chạy
            catch (Exception $e) {
                // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Mail không gửi được!'
                ));
                exit;
            }
        }
    }

    // Đăng nhập
    public function Login()
    {
        $error = false;
        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = mysqli_query($this->con, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
            $data = mysqli_fetch_assoc($result);
            if (!$result) {
                $error = mysqli_error($this->con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($this->con);
            if ($error !== false || $result->num_rows == 0) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Thông tin đăng nhập không đúng'
                ));
                exit;
            } else {
                $userlogin = [$email, $password, $data['name'], $data['user_id'], $data['phone']];
                $_SESSION['userlogin'] = $userlogin;

                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Đăng nhập thành công'
                ));
                exit;
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thông tin đăng nhập không đúng'
            ));
            exit;
        }
    }

    public function editUser($user_id, $name, $address, $phone)
    {
        if (isset($user_id) && isset($name) && isset($address) && isset($phone)) {
            $sql = "UPDATE user SET name='$name', address='$address', phone='$phone' WHERE user_id='$user_id'";
            $result = mysqli_query($this->con, $sql);

            if (!$result) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Cập nhật thông tin không thành công'
                ));
                exit;
            } else {
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Cập nhật thông tin thành công'
                ));
                exit;
            }
        } {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Đã xảy ra lỗi'
            ));
            exit;
        }
    }

    public function comment()
    {
        $error = false;
        if (isset($_SESSION['userlogin'])) {
            if (isset($_POST['content']) && !empty($_POST['content'])) {
                $comment_content = $_POST['content'];
                $product_id = $_POST['product_id'];
                $user_id = $_POST['user_id'];
                $comment_date = date('Y-m-d H:i:s');
                $result = mysqli_query($this->con, "INSERT INTO comment (user_id,product_id, comment_content,comment_date) VALUES ('" . $user_id . "','" . $product_id . "','" . $comment_content . "','" . $comment_date . "')");
                mysqli_close($this->con);
                if ($error !== false) {
                    echo json_encode(array(
                        'status' => 0,
                        'message' => 'Bình luận không thành công!'
                    ));
                    exit;
                } else {
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Bình luận thành công!'
                    ));
                    exit;
                }
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Vui lòng đăng nhập để sử dụng tính năng này'
            ));
            exit;
        }
    }

    public function deleteComment($id)
    {
        $sql = "DELETE FROM comment WHERE comment_id =$id";
        return mysqli_query($this->con, $sql);
    }

    public function showUserCheckout($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id=$user_id";
        return mysqli_query($this->con, $sql);
    }

    // LOGIN ADMIN

    public function LoginAdmin()
    {
        $error = false;
        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = mysqli_query($this->con, "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND role_id='2'");
            $data = mysqli_fetch_assoc($result);
            if (!$result) {
                $error = mysqli_error($this->con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($this->con);
            if ($error !== false || $result->num_rows == 0) {
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Thông tin đăng nhập không đúng'
                ));
                exit;
            } else {
                $userlogin = [$email, $password, $data['name'], $data['user_id'], $data['phone']];
                $_SESSION['userAdmin'] = $userlogin;

                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Đăng nhập thành công'
                ));
                exit;
            }
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thông tin đăng nhập không đúng'
            ));
            exit;
        }
    }

    // Thêm các phương thức cho việc quản lý tồn kho

    // Lấy thông tin chi tiết đơn hàng từ order_id
    public function getOrderDetails($order_id) {
        $qr = "SELECT * FROM order_details WHERE order_id = '$order_id'";
        $rows = mysqli_query($this->con, $qr);
        $data = array();
        while ($row = mysqli_fetch_array($rows)) {
            $data[] = $row;
        }
        return $data;
    }

    // Lấy thông tin variant từ variant_id
    public function getVariantInfo($variant_id) {
        $qr = "SELECT * FROM variant WHERE variant_id = '$variant_id'";
        $rows = mysqli_query($this->con, $qr);
        $data = mysqli_fetch_array($rows);
        return $data;
    }

    // Xử lý đặt hàng
    public function Order($user_id, $orderStatus = "Đang tiến hành") {
        try {
            // Kiểm tra giỏ hàng
            if (!isset($_SESSION['giohang']) || !is_array($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
                return false;
            }
            
            // Lấy thông tin từ form
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $note = isset($_POST['note']) ? $_POST['note'] : '';
            $banking = isset($_POST['banking']) ? $_POST['banking'] : 'payLater';
            $status = $orderStatus; // Sử dụng trạng thái được truyền vào
            $order_date = date('Y-m-d H:i:s');
            
            // Kiểm tra dữ liệu đầu vào
            if (empty($phone) || empty($address)) {
                return false;
            }
            
            // Lưu thông tin đơn hàng vào database
            $sql = "INSERT INTO orders (user_id, address, phone, note, method, status, order_date) 
                    VALUES ('$user_id', '$address', '$phone', '$note', '$banking', '$status', '$order_date')";
            $result = mysqli_query($this->con, $sql);
            
            if (!$result) {
                // Nếu có lỗi khi thêm đơn hàng
                return false;
            }
            
            // Lấy ID của đơn hàng vừa tạo
            $order_id = mysqli_insert_id($this->con);
            
            // Thêm chi tiết đơn hàng
            $order_success = true;
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                foreach ($_SESSION['giohang'] as $item) {
                    // Kiểm tra cấu trúc item hợp lệ
                    if (!isset($item[0]) || !isset($item[1]) || !isset($item[2]) || !isset($item[3])) {
                        continue;
                    }
                    
                    $size = $item[0]; // Kích cỡ
                    $product_id = $item[1]; // ID sản phẩm
                    $quantity = $item[2]; // Số lượng
                    $price = $item[3]; // Giá
                    
                    // Kiểm tra số lượng đặt hàng hợp lệ
                    if ($quantity <= 0) {
                        continue;
                    }
                    
                    // Lấy variant_id từ product_id và size
                    $query = "SELECT variant_id FROM variant WHERE product_id = '$product_id' AND size = '$size'";
                    $variant_result = mysqli_query($this->con, $query);
                    
                    if ($variant_result && mysqli_num_rows($variant_result) > 0) {
                        $variant_data = mysqli_fetch_assoc($variant_result);
                        $variant_id = $variant_data['variant_id'];
                        
                        // Tính tổng tiền
                        $price_total = $price * $quantity;
                        
                        // Thêm chi tiết đơn hàng
                        $detail_sql = "INSERT INTO order_details (order_id, variant_id, price_total, num) 
                                      VALUES ('$order_id', '$variant_id', '$price_total', '$quantity')";
                        $detail_result = mysqli_query($this->con, $detail_sql);
                        
                        if (!$detail_result) {
                            // Ghi log lỗi nếu cần thiết
                            $order_success = false;
                        }
                    }
                }
            }
            
            // Nếu không có chi tiết đơn hàng nào được thêm thành công, hủy đơn hàng
            if (!$order_success) {
                $cancel_sql = "DELETE FROM orders WHERE order_id = '$order_id'";
                mysqli_query($this->con, $cancel_sql);
                return false;
            }
            
            // Trả về order_id nếu thành công
            return $order_id;
        } catch (Exception $e) {
            // Ghi log lỗi nếu cần
            return false;
        }
    }
}
