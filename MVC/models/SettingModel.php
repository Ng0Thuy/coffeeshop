<?php
class SettingModel extends DB
{
    // Lấy tất cả cài đặt hệ thống
    public function getAllSettings()
    {
        $sql = "SELECT * FROM system_settings";
        $result = mysqli_query($this->con, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['setting_key']] = $row;
        }
        return $data;
    }

    // Lấy giá trị cài đặt theo key
    public function getSetting($key)
    {
        $sql = "SELECT * FROM system_settings WHERE setting_key = '$key'";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return false;
    }

    // Cập nhật giá trị cài đặt
    public function updateSetting($key, $value)
    {
        $sql = "UPDATE system_settings SET setting_value = '$value' WHERE setting_key = '$key'";
        return mysqli_query($this->con, $sql);
    }

    // Thêm cài đặt mới
    public function addSetting($key, $value, $description)
    {
        $sql = "INSERT INTO system_settings (setting_key, setting_value, description) VALUES ('$key', '$value', '$description')";
        return mysqli_query($this->con, $sql);
    }

    // Kiểm tra và tạo bảng system_settings nếu chưa tồn tại
    public function createSystemSettingsTable()
    {
        // Kiểm tra xem bảng đã tồn tại chưa
        $checkTable = mysqli_query($this->con, "SHOW TABLES LIKE 'system_settings'");
        if (mysqli_num_rows($checkTable) == 0) {
            // Bảng chưa tồn tại, tạo bảng mới
            $sql = "CREATE TABLE system_settings (
                id INT AUTO_INCREMENT PRIMARY KEY,
                setting_key VARCHAR(255) NOT NULL UNIQUE,
                setting_value VARCHAR(255) NOT NULL,
                description TEXT,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            if (mysqli_query($this->con, $sql)) {
                // Bảng đã được tạo, thêm cài đặt mặc định
                $this->addSetting('max_cart_quantity', '10', 'Số lượng tối đa sản phẩm mỗi lần thêm vào giỏ hàng');
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
} 