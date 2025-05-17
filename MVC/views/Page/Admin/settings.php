<div class="container-fluid">
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Cài đặt hệ thống</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="settingsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="30%">Tên cài đặt</th>
                            <th width="20%">Giá trị</th>
                            <th width="40%">Mô tả</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data["ShowSettings"]) && !empty($data["ShowSettings"])) {
                            foreach ($data["ShowSettings"] as $key => $setting) {
                        ?>
                                <tr id="setting-row-<?php echo $setting['id']; ?>">
                                    <td><?php echo htmlspecialchars($setting['setting_key']); ?></td>
                                    <td>
                                        <span class="setting-value"><?php echo htmlspecialchars($setting['setting_value']); ?></span>
                                    </td>
                                    <td><?php echo htmlspecialchars($setting['description']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm edit-setting" 
                                            data-id="<?php echo $setting['id']; ?>" 
                                            data-key="<?php echo $setting['setting_key']; ?>" 
                                            data-value="<?php echo $setting['setting_value']; ?>"
                                            data-toggle="modal" data-target="#editSettingModal">
                                            <i class="fas fa-edit"></i> Sửa
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="4" class="text-center">Không có dữ liệu cài đặt</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Chỉnh sửa cài đặt -->
<div class="modal fade" id="editSettingModal" tabindex="-1" role="dialog" aria-labelledby="editSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSettingModalLabel">Chỉnh sửa cài đặt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSettingForm">
                    <input type="hidden" id="setting_key" name="setting_key">
                    <div class="form-group">
                        <label for="setting_value">Giá trị</label>
                        <input type="text" class="form-control" id="setting_value" name="setting_value" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="saveSettingBtn">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Khi nhấn vào nút sửa cài đặt
        $('.edit-setting').click(function() {
            var key = $(this).data('key');
            var value = $(this).data('value');
            
            $('#setting_key').val(key);
            $('#setting_value').val(value);
        });
        
        // Khi nhấn vào nút lưu thay đổi
        $('#saveSettingBtn').click(function() {
            var key = $('#setting_key').val();
            var value = $('#setting_value').val();
            
            $.ajax({
                url: '<?= BASE_URL ?>/Admin/updateSetting',
                type: 'POST',
                data: {
                    key: key,
                    value: value
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Cập nhật giá trị trên bảng
                        $('tr').find('[data-key="' + key + '"]').closest('tr').find('.setting-value').text(value);
                        
                        // Hiển thị thông báo thành công
                        alert(response.message);
                        
                        // Đóng modal
                        $('#editSettingModal').modal('hide');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi cập nhật cài đặt!');
                }
            });
        });
    });
</script> 