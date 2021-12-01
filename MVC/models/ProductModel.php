<?php
class ProductModel extends DB
{

    public function ListAll()
    {
        $sql = "SELECT * FROM product";
        return mysqli_query($this->con, $sql);
    }
    public function ListAllAdmin()
    {
        $sql = "SELECT * FROM product INNER JOIN variant ON product.product_id = variant.product_id WHERE size = 'Vừa' ORDER BY import_date DESC";
        return mysqli_query($this->con, $sql);
    }
    public function ListItem($id)
    {
        $sql = "SELECT * FROM product where product_id = $id";
        return mysqli_query($this->con, $sql);
    }
    public function ListItemVariant($id)
    {
        // $sql = "SELECT * FROM product variant where product_id = $id";
        $sql = "SELECT * FROM product INNER JOIN variant ON product.product_id = variant.product_id WHERE size = 'Vừa'";
        return mysqli_query($this->con, $sql);
    }

    public function showProducsAll($id)
    {
        $sql = "SELECT * FROM product INNER JOIN variant ON product.product_id = variant.product_id WHERE product_id = $id";
        return mysqli_query($this->con, $sql);
    }
    public function ShowVariant($id)
    {
        $sql = "SELECT * FROM variant where product_id = $id";
        return mysqli_query($this->con, $sql);
    }

    public function add()
    {
        $error = false;
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name']; //Tên Products

            $sizeM = $_POST['sizeM']; //SIZE M
            $sizeML = $_POST['sizeML']; //SIZE ML
            $sizeL = $_POST['sizeL']; //SIZE L

            $priceSale = $_POST['priceSale'];
            $description = $_POST['description'];
            $import_date = date('Y-m-d H:i:s');

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Dữ liệu gửi lên server không bằng phương thức post
                echo '
                    <script>
                        alert("Dữ liệu chưa có")
                        window.location.assign("./Category");
                    </script>
                ';
                die;
            }
            // Kiểm tra có dữ liệu thumbnail trong $_FILES không
            // Nếu không có thì dừng
            if (!isset($_FILES["thumbnail"])) {
                echo '
                    <script>
                        alert("Dữ liệu không đúng cấu trúc")
                        window.location.assign("./product");
                    </script>
                ';
                die;
            }
            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["thumbnail"]['error'] != 0) {
                echo '
                    <script>
                        alert("Dữ liệu upload bị lỗi")
                        window.location.assign("./product");
                    </script>
                ';
                die;
            }
            // Đã có dữ liệu upload, thực hiện xử lý file upload
            //Thư mục bạn sẽ lưu file upload
            $target_dir    = "mvc/public/images/products/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;
            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
                if ($check !== false) {
                    // echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                } else {
                    echo '
                    <script>
                        alert("Không phải file ảnh")
                        window.location.assign("./product");
                    </script>
                ';
                    $allowUpload = false;
                }
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
                echo '
                    <script>
                        alert("Không được upload ảnh lớn hơn 800000 (bytes).")
                        window.location.assign("./product");
                    </script>
                ';
                $allowUpload = false;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType, $allowtypes)) {
                echo '
                    <script>
                        alert("Chỉ được upload các định dạng JPG, PNG, JPEG, GIF")
                        window.location.assign("./product");
                    </script>
                ';
                $allowUpload = false;
            }

            if ($allowUpload) {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                } else {
                    echo '
                    <script>
                        alert("Có lỗi xảy ra khi upload file")
                        // window.location.assign("./product");
                    </script>
                ';
                }
            } else {
                echo '
                    <script>
                        alert("Không upload được file, có thể do file lớn, kiểu file không đúng ...")
                        window.location.assign("./product");
                    </script>
                ';
            }

            $result = mysqli_query($this->con, "INSERT INTO product(category_id, product_name,thumbnail, description, price_sale , active, import_date) 
            VALUES ('" . $category_id . "','" . $name . "','" . $target_file . "','" . $description . "','" . $priceSale . "','" . 1 . "','" . $import_date . "')");
            $checkProducID = mysqli_query($this->con, "SELECT * FROM product WHERE import_date ='$import_date'");
            $id = mysqli_fetch_assoc($checkProducID);
            $product_id = $id['product_id'];
            if ($sizeM !== "") {
                mysqli_query($this->con, "INSERT INTO variant(product_id, size, price) 
                VALUES('" . $product_id . "','Nhỏ','" . $sizeM . "')");
            }
            if ($sizeML !== "") {
                mysqli_query($this->con, "INSERT INTO variant(product_id, size, price) 
                VALUES('" . $product_id . "','Vừa','" . $sizeML . "')");
            }
            if ($sizeL !== "") {
                mysqli_query($this->con, "INSERT INTO variant(product_id, size, price) 
                VALUES('" . $product_id . "','Lớn','" . $sizeL . "')");
            }
            mysqli_close($this->con);
            if ($error !== false) {
                echo '
                    <script>
                        alert("Có lỗi khi thêm sản phẩm, xin mời thử lại")
                        window.location.assign("./product");
                    </script>
                ';
                exit;
            } else {
                echo '
                <script>
                    alert("Thêm sản phẩm thành công")
                    window.location.assign("./product");
                </script>
            ';
                exit;
            }
        } else {
            echo '
            <script>
                alert("Bạn chưa nhập thông tin")
                window.location.assign("./product");
            </script>
        ';
            exit;
        }
    }

    // EDIT PRODUCT
    public function Edit()
    {
        $error = false;
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name']; //Tên Products
            $product_id = $_POST['product_id']; //ID Products

            $sizeM = $_POST['Nhỏ']; //SIZE M
            $sizeML = $_POST['Vừa']; //SIZE ML
            $sizeL = $_POST['Lớn']; //SIZE L

            $priceSale = $_POST['priceSale'];
            $description = $_POST['description'];

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Dữ liệu gửi lên server không bằng phương thức post
                echo '
                    <script>
                        alert("Dữ liệu chưa có")
                        window.location.assign("./Product");
                    </script>
                ';
                die;
            }
            // Kiểm tra có dữ liệu thumbnail trong $_FILES không
            // Nếu không có thì dừng
            if (!isset($_FILES["thumbnail"])) {
                echo '
                    <script>
                        alert("Dữ liệu không đúng cấu trúc")
                        window.location.assign("./Product");
                    </script>
                ';
                die;
            }
            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["thumbnail"]['error'] != 0) {
                $sql = "SELECT * FROM product where product_id='$product_id'";
                $row = mysqli_query($this->con, $sql);
                $result = mysqli_fetch_assoc($row);
                $thumbnail = $result['thumbnail'];
                $kq = mysqli_query($this->con, "UPDATE product SET  category_id = '$category_id',product_name='$name', price_sale = '$priceSale', description = '$description'  WHERE product_id = '$product_id' ");

                if (isset($sizeM)) {
                    mysqli_query($this->con, "UPDATE variant SET  price = '$sizeM' WHERE product_id = '$product_id' AND size = 'Nhỏ'");
                }
                if (isset($sizeML)) {
                    mysqli_query($this->con, "UPDATE variant SET  price = '$sizeML' WHERE product_id = '$product_id' AND size = 'Vừa'");
                }
                if (isset($sizeL)) {
                    mysqli_query($this->con, "UPDATE variant SET  price = '$sizeL' WHERE product_id = '$product_id' AND size = 'Lớn'");
                }

                echo '
                    <script>
                        alert("Sửa sản phẩm thành công")
                        window.location.assign("./Product");
                    </script>
                ';
                die;
            }
            // Đã có dữ liệu upload, thực hiện xử lý file upload
            //Thư mục bạn sẽ lưu file upload
            $target_dir    = "mvc/public/images/products/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;
            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
            if (isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
                if ($check !== false) {
                    // echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                } else {
                    echo '
                    <script>
                        alert("Không phải file ảnh")
                        window.location.assign("./Product");
                    </script>
                ';
                    $allowUpload = false;
                    exit;
                }
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
                echo '
                    <script>
                        alert("Không được upload ảnh lớn hơn 800000 (bytes).")
                        window.location.assign("./Product");
                    </script>
                ';
                $allowUpload = false;
                exit;
            }

            // Kiểm tra kiểu file
            if (!in_array($imageFileType, $allowtypes)) {
                echo '
                    <script>
                        alert("Chỉ được upload các định dạng JPG, PNG, JPEG, GIF")
                        window.location.assign("./Product");
                    </script>
                ';
                $allowUpload = false;
                exit;
            }

            if ($allowUpload) {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                } else {
                    echo '
                    <script>
                        alert("Có lỗi xảy ra khi upload file")
                        window.location.assign("./Product");
                    </script>
                ';
                    exit;
                }
            } else {
                echo '
                    <script>
                        alert("Không upload được file, có thể do file lớn, kiểu file không đúng ...")
                        window.location.assign("./Product");
                    </script>
                ';
                exit;
            }
            $result = mysqli_query($this->con, "UPDATE product SET  thumbnail = '$target_file', category_id = '$category_id',product_name='$name',thumbnail = '$target_file', description = '$description', price_sale = '$priceSale'  WHERE product_id = '$product_id'");

            if (isset($sizeM)) {
                mysqli_query($this->con, "UPDATE variant SET  price = '$sizeM' WHERE product_id = '$product_id' AND size = 'Nhỏ'");
            }
            if (isset($sizeML)) {
                mysqli_query($this->con, "UPDATE variant SET  price = '$sizeML' WHERE product_id = '$product_id' AND size = 'Vừa'");
            }
            if (isset($sizeL)) {
                mysqli_query($this->con, "UPDATE variant SET  price = '$sizeL' WHERE product_id = '$product_id' AND size = 'Lớn'");
            }

            mysqli_close($this->con);
            if ($error !== false) {
                echo '
                    <script>
                        alert("Đã xảy ra lỗi, vui lòng thử lại");
                        window.location.assign("./Product");
                        
                    </script>
                ';
                exit;
            } else {
                echo '
                    <script>
                        alert("Sửa sản phẩm thành công");
                        window.location.assign("./Product");
                    </script>
                ';
                exit;
            }
        } else {
            echo '
                    <script>
                        alert("Bạn chưa nhập thông tin");
                        window.location.assign("./Product");
                    </script>
                ';
            exit;
        }
    }

    public function deleteVariant($id)
    {
        $sql = "DELETE FROM variant where product_id=$id";
        var_dump($sql);
        return mysqli_query($this->con, $sql);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product where product_id=$id";
        var_dump($sql);
        return mysqli_query($this->con, $sql);
    }
}
