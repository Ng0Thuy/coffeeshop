<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Chi tiết tồn kho: 
                <?php 
                    if (isset($data["ProductDetail"]) && $data["ProductDetail"]) {
                        echo $data["ProductDetail"]["product_name"];
                    } else {
                        echo "Không tìm thấy sản phẩm";
                    }
                ?>
            </h6>
            <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <?php if (isset($data["ProductDetail"]) && $data["ProductDetail"]): ?>
                        <img src="<?= BASE_URL ?>/<?php echo $data["ProductDetail"]["thumbnail"]; ?>" class="card-img-top" alt="<?php echo $data["ProductDetail"]["product_name"]; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data["ProductDetail"]["product_name"]; ?></h5>
                            <p class="card-text">
                                <strong>ID:</strong> <?php echo $data["ProductDetail"]["product_id"]; ?><br>
                                <strong>Danh mục:</strong> <?php echo $data["ProductDetail"]["category_id"]; ?><br>
                                <strong>Giá bán:</strong> <?php echo number_format($data["ProductDetail"]["price_sale"], 0, ',', '.'); ?> VNĐ<br>
                                <strong>Mô tả:</strong> <?php echo $data["ProductDetail"]["description"]; ?>
                            </p>
                        </div>
                        <?php else: ?>
                        <div class="card-body">
                            <h5 class="card-title text-danger">Không tìm thấy thông tin sản phẩm!</h5>
                            <p class="card-text">Sản phẩm không tồn tại hoặc đã bị xóa.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Quản lý tồn kho theo kích thước</h6>
                        </div>
                        <div class="card-body">
                            <!-- Hiển thị tồn kho hiện tại -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kích thước</th>
                                            <th>Số lượng tồn</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($data["StockDetails"]) && count($data["StockDetails"]) > 0) {
                                            foreach ($data["StockDetails"] as $stock) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $stock["size"]; ?></td>
                                                    <td><?php echo $stock["quantity"]; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($stock["quantity"] <= 0) {
                                                            echo '<span class="badge badge-danger">Hết hàng</span>';
                                                        } elseif ($stock["quantity"] <= 10) {
                                                            echo '<span class="badge badge-warning">Sắp hết</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Còn hàng</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= BASE_URL ?>/Admin/stockEdit/<?php echo $stock["product_id"]; ?>/<?php echo urlencode($stock["size"]); ?>" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i> Sửa
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $stock['id']; ?>)" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="4" class="text-center">Không có dữ liệu tồn kho</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Form thêm tồn kho hàng loạt -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-success">Thêm tồn kho mới</h6>
                                </div>
                                <div class="card-body">
                                    <form action="<?= BASE_URL ?>/Admin/stockAddBatch" method="post">
                                        <?php if (isset($data["ProductDetail"]) && $data["ProductDetail"]): ?>
                                        <input type="hidden" name="product_id" value="<?php echo $data["ProductDetail"]["product_id"]; ?>">
                                        
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <p class="text-info">Nhập số lượng cần thêm vào tồn kho (nhập 0 nếu không thay đổi)</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <?php
                                            if (isset($data["StockDetails"]) && !empty($data["StockDetails"])) {
                                                foreach ($data["StockDetails"] as $index => $stock) {
                                            ?>
                                                <div class="col-md-4 mb-3">
                                                    <div class="form-group">
                                                        <label for="quantity_<?php echo $index; ?>">
                                                            Size <?php echo $stock["size"]; ?>:
                                                            <span class="text-muted">(hiện có: <?php echo $stock["quantity"]; ?>)</span>
                                                        </label>
                                                        <input type="hidden" name="sizes[]" value="<?php echo $stock["size"]; ?>">
                                                        <input type="number" class="form-control" id="quantity_<?php echo $index; ?>" name="quantities[]" min="0" value="0">
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            } else {
                                                echo '<div class="col-12"><p class="text-warning">Không có dữ liệu kích thước cho sản phẩm này. Hãy thêm các kích thước cho sản phẩm trước.</p></div>';
                                            }
                                            ?>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-plus"></i> Cập nhật tồn kho
                                                </button>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="alert alert-danger">
                                            <strong>Lỗi!</strong> Không thể tìm thấy thông tin sản phẩm để thêm tồn kho.
                                        </div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa thông tin tồn kho này?")) {
            window.location.href = "<?= BASE_URL ?>/Admin/stockDelete/" + id;
        }
    }
</script> 