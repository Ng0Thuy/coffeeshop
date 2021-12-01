<?php
class UserModel extends DB
{
    public function ListAll()
    {
        $sql = "SELECT * FROM user";
        return mysqli_query($this->con, $sql);
    }
    public function ListUserRole()
    {
        $sql = "SELECT * FROM user 
        INNER JOIN role WHERE role.role_id = user.role_id ORDER BY user_id DESC";
        return mysqli_query($this->con, $sql);
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
}
