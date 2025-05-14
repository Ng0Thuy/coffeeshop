<?php
class StockModel extends DB {
    // Lấy số lượng tồn kho của một sản phẩm theo kích cỡ
    public function getStock($product_id, $size) {
        $qr = "SELECT * FROM stock WHERE product_id = '$product_id' AND size = '$size'";
        $rows = mysqli_query($this->con, $qr);
        $data = mysqli_fetch_array($rows);
        return $data;
    }

    // Lấy tất cả thông tin tồn kho của một sản phẩm
    public function getStockByProduct($product_id) {
        $qr = "SELECT * FROM stock WHERE product_id = '$product_id'";
        $rows = mysqli_query($this->con, $qr);
        $data = array();
        while ($row = mysqli_fetch_array($rows)) {
            $data[] = $row;
        }
        return $data;
    }

    // Lấy tất cả thông tin tồn kho của tất cả sản phẩm
    public function getAllStock() {
        $qr = "SELECT s.*, p.product_name, v.size as variant_size 
               FROM stock s 
               INNER JOIN product p ON s.product_id = p.product_id 
               INNER JOIN variant v ON s.product_id = v.product_id AND s.size = v.size";
        $rows = mysqli_query($this->con, $qr);
        $data = array();
        while ($row = mysqli_fetch_array($rows)) {
            $data[] = $row;
        }
        return $data;
    }

    // Thêm số lượng tồn kho cho một sản phẩm
    public function addStock($product_id, $size, $quantity) {
        // Kiểm tra xem sản phẩm đã có trong kho chưa
        $check = $this->getStock($product_id, $size);
        
        if ($check) {
            // Nếu đã có, cập nhật số lượng
            $new_quantity = $check['quantity'] + $quantity;
            $qr = "UPDATE stock SET quantity = '$new_quantity' WHERE product_id = '$product_id' AND size = '$size'";
            mysqli_query($this->con, $qr);
            
            // Ghi lại transaction
            $this->addTransaction($product_id, $size, $quantity, 'Nhập kho', 'Thành công');
            
            return true;
        } else {
            // Nếu chưa có, thêm mới
            $qr = "INSERT INTO stock (product_id, size, quantity) VALUES ('$product_id', '$size', '$quantity')";
            $result = mysqli_query($this->con, $qr);
            
            // Ghi lại transaction
            if ($result) {
                $this->addTransaction($product_id, $size, $quantity, 'Nhập kho mới', 'Thành công');
                return true;
            } else {
                return false;
            }
        }
    }

    // Cập nhật số lượng tồn kho
    public function updateStock($product_id, $size, $quantity) {
        $qr = "UPDATE stock SET quantity = '$quantity' WHERE product_id = '$product_id' AND size = '$size'";
        $result = mysqli_query($this->con, $qr);
        
        if ($result) {
            $this->addTransaction($product_id, $size, $quantity, 'Cập nhật kho', 'Thành công');
            return true;
        } else {
            return false;
        }
    }

    // Giảm số lượng tồn kho sau khi thanh toán
    public function decreaseStock($product_id, $size, $quantity) {
        $stock = $this->getStock($product_id, $size);
        
        if (!$stock || $stock['quantity'] < $quantity) {
            // Không đủ hàng
            return false;
        }
        
        $new_quantity = $stock['quantity'] - $quantity;
        $qr = "UPDATE stock SET quantity = '$new_quantity' WHERE product_id = '$product_id' AND size = '$size'";
        $result = mysqli_query($this->con, $qr);
        
        if ($result) {
            $this->addTransaction($product_id, $size, $quantity, 'Bán hàng', 'Thành công');
            return true;
        } else {
            return false;
        }
    }

    // Xóa thông tin tồn kho
    public function deleteStock($stock_id) {
        $qr = "DELETE FROM stock WHERE id = '$stock_id'";
        return mysqli_query($this->con, $qr);
    }

    // Thêm transaction
    private function addTransaction($product_id, $size, $quantity, $type, $status) {
        $date = date('Y-m-d H:i:s');
        $qr = "INSERT INTO transactions (product_id, size, quantity, type, date, status) 
               VALUES ('$product_id', '$size', '$quantity', '$type', '$date', '$status')";
        return mysqli_query($this->con, $qr);
    }

    // Lấy danh sách transactions
    public function getTransactions($limit = 10) {
        $qr = "SELECT t.*, p.product_name 
               FROM transactions t 
               INNER JOIN product p ON t.product_id = p.product_id 
               ORDER BY t.date DESC 
               LIMIT $limit";
        $rows = mysqli_query($this->con, $qr);
        $data = array();
        while ($row = mysqli_fetch_array($rows)) {
            $data[] = $row;
        }
        return $data;
    }

    // Kiểm tra xem có đủ số lượng tồn kho không
    public function checkStockAvailable($product_id, $size, $quantity) {
        // Đảm bảo số lượng là số dương
        $quantity = max(0, intval($quantity));
        if ($quantity <= 0) {
            return [
                'status' => false,
                'message' => 'Số lượng không hợp lệ',
                'available' => 0
            ];
        }
        
        $stock = $this->getStock($product_id, $size);
        
        if (!$stock) {
            return [
                'status' => false,
                'message' => 'Sản phẩm không có trong kho',
                'available' => 0
            ];
        } 
        
        if ($stock['quantity'] <= 0) {
            return [
                'status' => false,
                'message' => 'Sản phẩm đã hết hàng',
                'available' => 0
            ];
        }
        
        if ($stock['quantity'] < $quantity) {
            return [
                'status' => false,
                'message' => 'Chỉ còn '.$stock['quantity'].' sản phẩm',
                'available' => $stock['quantity']
            ];
        }
        
        return [
            'status' => true,
            'message' => 'Đủ hàng',
            'available' => $stock['quantity']
        ];
    }
} 